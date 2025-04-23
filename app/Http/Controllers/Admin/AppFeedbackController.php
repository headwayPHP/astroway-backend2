<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Client;
use App\Models\Service;
use App\Models\Contactus;
use App\Models\Appointment;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\RemoteBooking;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel\AppReview;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppFeedbackController extends Controller
{
    public $path;
    public $limit = 15;
    public $paginationStart;

    public function getAppFeedback(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ? $request->page : 1;
                $paginationStart = ($page - 1) * $this->limit;

                $feedback = AppReview::select('app_reviews.*', 'users.name', 'users.contactNo', 'users.profile')
                    ->join('users', 'users.id', '=', 'app_reviews.userId')
                    ->orderBy('app_reviews.id', 'DESC');

                $totalRecords = $feedback->count();

                // Adjust page number if it exceeds total pages
                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                // Retrieve feedback for the current page
                $feedback = $feedback->skip($paginationStart)
                    ->take($this->limit)
                    ->orderBy('app_reviews.id', 'DESC')
                    ->get();

                // Calculate start and end records for the current page
                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.app-feedback', compact('feedback', 'totalPages', 'totalRecords', 'start', 'end', 'page'));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    #-------------------------------------------------------------------------------------------------------------------------------------------------------
    public function contactList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ? $request->page : 1;
                $paginationStart = ($page - 1) * $this->limit;

                $contacts = Contactus::orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $totalRecords = $contacts->count();

                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.contactlist', compact('contacts', 'totalPages', 'totalRecords', 'start', 'end', 'page'));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    public function appointmentList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ? $request->page : 1;
                $paginationStart = ($page - 1) * $this->limit;

                $appointments = Appointment::orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $totalRecords = Appointment::count();
                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.appointmentlist', compact('appointments', 'totalPages', 'totalRecords', 'start', 'end', 'page'));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function appointmentShow($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $appointment = Appointment::where('id', $id)->findOrFail($id);
                // dd($appointment);
                return view('pages.appointmentshow', [
                    'layout' => 'side-menu',
                    'appointment' => $appointment,
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    public function remotebookingList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ? $request->page : 1;
                $paginationStart = ($page - 1) * $this->limit;

                $remotebookings = RemoteBooking::orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $totalRecords = RemoteBooking::count();
                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.remotebookinglist', compact('remotebookings', 'totalPages', 'totalRecords', 'start', 'end', 'page'));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function remotebookingShow($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $booking = RemoteBooking::where('id', $id)->findOrFail($id);

                // Check if layout map is a DWG file
                $isDwg = false;
                if ($booking->layout_map) {
                    $extension = strtolower(pathinfo($booking->layout_map, PATHINFO_EXTENSION));
                    $isDwg = ($extension === 'dwg');
                }

                return view('pages.remotebookingshow', [
                    'layout' => 'side-menu',
                    'booking' => $booking,
                    'isDwg' => $isDwg,
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    // List all services
    public function serviceList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ?? 1;
                $paginationStart = ($page - 1) * $this->limit;

                $searchString = $request->input('searchString', '');

                $query = Service::query();

                if (!empty($searchString)) {
                    $query->where('service_title', 'LIKE', '%' . $searchString . '%');
                }

                $totalRecords = $query->count();

                $services = $query->orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.servicelist', compact(
                    'services',
                    'totalPages',
                    'totalRecords',
                    'start',
                    'end',
                    'page',
                    'searchString'
                ));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    // Show a specific service
    public function serviceShow($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $service = Service::findOrFail($id);
                return view('pages.serviceshow', [
                    'layout' => 'side-menu',
                    'service' => $service,
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    // Update service
    public function serviceUpdate(Request $request, $id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $service = Service::findOrFail($id);

                $service->service_title = $request->service_title;
                $service->service_details = $request->service_details;

                // Update icon
                if ($request->hasFile('service_icon')) {
                    $iconPath = $request->file('service_icon')->store('services/icons', 'public');
                    $service->service_icon = $iconPath;
                }

                // Update banner
                if ($request->hasFile('service_banner')) {
                    $bannerPath = $request->file('service_banner')->store('services/banners', 'public');
                    $service->service_banner = $bannerPath;
                }

                // Update gallery images
                if ($request->hasFile('service_images')) {
                    $images = [];
                    foreach ($request->file('service_images') as $image) {
                        $images[] = $image->store('services/images', 'public');
                    }
                    $service->service_images = json_encode($images);
                }

                $service->save();

                return redirect()->route('servicelist')->with('success', 'Service updated successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function serviceAdd()
    {
        try {
            if (Auth::guard('web')->check()) {
                return view('pages.serviceadd', ['layout' => 'side-menu']);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function serviceEdit($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $service = Service::findOrFail($id);
                return view('pages.serviceedit', [
                    'layout' => 'side-menu',
                    'service' => $service
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    public function serviceAddApi(Request $request)
    {
        // dd($request->all());
        try {
            if (Auth::guard('web')->check()) {
                $validator = Validator::make($request->all(), [
                    'service_title' => 'required|string|max:255',
                    'service_details' => 'required|string',
                    'service_icon' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'service_banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
                    'service_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Upload icon
                $iconPath = $request->file('service_icon')->store('services/icons', 'public');

                // Upload banner
                $bannerPath = $request->file('service_banner')->store('services/banners', 'public');

                // Upload gallery images if any
                $images = [];
                if ($request->hasFile('service_images')) {
                    foreach ($request->file('service_images') as $image) {
                        $images[] = $image->store('services/images', 'public');
                    }
                }

                // Save service
                Service::create([
                    'service_title' => $request->service_title,
                    'service_details' => $request->service_details,
                    'service_icon' => $iconPath,
                    'service_banner' => $bannerPath,
                    'service_images' => json_encode($images),
                ]);

                return redirect()->route('servicelist')->with('success', 'Service added successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    public function serviceDelete($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                // Find the service or fail
                $service = Service::findOrFail($id);

                // (Optional) Remove associated files from storage if needed:
                // Storage::disk('public')->delete($service->service_icon);
                // Storage::disk('public')->delete($service->service_banner);
                // if ($service->service_images) {
                //     foreach (json_decode($service->service_images, true) as $image) {
                //         Storage::disk('public')->delete($image);
                //     }
                // }

                // Delete the service record
                $service->delete();

                return redirect()->route('servicelist')->with('success', 'Service deleted successfully.');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function clientList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ?? 1;
                $paginationStart = ($page - 1) * $this->limit;

                $searchString = $request->input('searchString', '');

                $query = Client::query();

                if (!empty($searchString)) {
                    $query->where('client_name', 'LIKE', '%' . $searchString . '%');
                }

                $totalRecords = $query->count();

                $clients = $query->orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.clientlist', compact(
                    'clients',
                    'totalPages',
                    'totalRecords',
                    'start',
                    'end',
                    'page',
                    'searchString'
                ));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function clientShow($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $client = Client::findOrFail($id);
                return view('pages.clientshow', [
                    'layout' => 'side-menu',
                    'client' => $client,
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function clientUpdate(Request $request, $id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $client = Client::findOrFail($id);

                $client->client_name = $request->client_name;
                $client->status = $request->status;


                if ($request->hasFile('client_image')) {
                    $imagePath = $request->file('client_image')->store('uploads/clients', 'public');
                    $client->client_image = $imagePath;
                }

                $client->save();

                return redirect()->route('clientlist')->with('success', 'Client updated successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function clientAdd()
    {
        try {
            if (Auth::guard('web')->check()) {
                return view('pages.clientadd', ['layout' => 'side-menu']);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function clientEdit($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $client = Client::findOrFail($id);
                return view('pages.clientedit', [
                    'layout' => 'side-menu',
                    'client' => $client
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function clientAddApi(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $validator = Validator::make($request->all(), [
                    'client_name' => 'required|string|max:255',
                    'client_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'status' => 'required|in:active,inactive',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Upload client image
                // $file = $request->file('client_image');
                // $filename = time() . '_' . $file->getClientOriginalName();
                // $file->move(public_path('uploads/clients'), $filename);
                // dd("here");
                $imagePath = $request->file('client_image')->store('uploads/clients', 'public');
                // $imagePath = 'uploads/clients/' . $filename;
                // dd($imagePath);
                // Save client
                Client::create([
                    'client_name' => $request->client_name,
                    'client_image' => $imagePath,
                    'status' => $request->status,
                ]);

                return redirect()->route('clientlist')->with('success', 'Client added successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error adding client: ' . $e->getMessage());
        }
    }

    public function clientDelete($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                // Find the client or fail
                $client = Client::findOrFail($id);

                // Remove associated image file from storage if it exists
                if ($client->client_image && file_exists(public_path($client->client_image))) {
                    unlink(public_path($client->client_image));
                }

                // Delete the client record
                $client->delete();

                return redirect()->route('clientlist')->with('success', 'Client deleted successfully.');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting client: ' . $e->getMessage());
        }
    }

    public function testimonialList(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ?? 1;
                $paginationStart = ($page - 1) * $this->limit;

                $searchString = $request->input('searchString', '');

                $query = Testimonial::query();

                if (!empty($searchString)) {
                    $query->where('name', 'LIKE', '%' . $searchString . '%')
                        ->orWhere('profession', 'LIKE', '%' . $searchString . '%')
                        ->orWhere('testimonial', 'LIKE', '%' . $searchString . '%');
                }

                $totalRecords = $query->count();

                $testimonials = $query->orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $totalPages = ceil($totalRecords / $this->limit);
                $page = min($page, $totalPages);

                $start = ($this->limit * ($page - 1)) + 1;
                $end = min($this->limit * $page, $totalRecords);

                return view('pages.testimoniallist', compact(
                    'testimonials',
                    'totalPages',
                    'totalRecords',
                    'start',
                    'end',
                    'page',
                    'searchString'
                ));
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function testimonialShow($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $testimonial = Testimonial::findOrFail($id);
                return view('pages.testimonialshow', [
                    'layout' => 'side-menu',
                    'testimonial' => $testimonial,
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function testimonialUpdate(Request $request, $id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'profession' => 'required|string|max:255',
                    'testimonial' => 'required|string',
                    'status' => 'required|in:active,inactive',
                    'image' => 'nullable',
                ]);

                $testimonial = Testimonial::findOrFail($id);

                $testimonial->name = $request->name;
                $testimonial->profession = $request->profession;
                $testimonial->testimonial = $request->testimonial;
                $testimonial->status = $request->status;

                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('uploads/testimonials', 'public');
                    $testimonial->image = $imagePath;
                }
                $testimonial->save();
                // dd($testimonial);

                return redirect()->route('testimoniallist')->with('success', 'Testimonial updated successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function testimonialAdd()
    {
        try {
            if (Auth::guard('web')->check()) {
                return view('pages.testimonialadd', ['layout' => 'side-menu']);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function testimonialEdit($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                $testimonial = Testimonial::findOrFail($id);
                return view('pages.testimonialedit', [
                    'layout' => 'side-menu',
                    'testimonial' => $testimonial
                ]);
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function testimonialAddApi(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                // Validate the incoming request
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'testimonial' => 'required|string|max:1000', // Assuming the testimonial content is a string of max length 1000
                    'profession' => 'required|string|max:255', // Assuming profession is a string
                    'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // Image validation
                    'status' => 'required|in:active,inactive',
                ]);

                // If validation fails, return with errors
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Upload testimonial image
                $imagePath = $request->file('image')->store('uploads/testimonials', 'public');

                // Save testimonial record
                Testimonial::create([
                    'name' => $request->name,
                    'testimonial' => $request->testimonial,
                    'profession' => $request->profession,
                    'image' => $imagePath,
                    'status' => $request->status,
                ]);

                // Return success response
                return redirect()->route('testimoniallist')->with('success', 'Testimonial added successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error adding testimonial: ' . $e->getMessage());
        }
    }


    public function testimonialDelete($id)
    {
        try {
            if (Auth::guard('web')->check()) {
                // Find the testimonial or fail
                $testimonial = Testimonial::findOrFail($id);

                // Remove associated image file from storage if it exists
                if ($testimonial->image && file_exists(public_path('storage/' . $testimonial->image))) {
                    unlink(public_path('storage/' . $testimonial->image));
                }

                // Delete the testimonial record
                $testimonial->delete();

                return redirect()->route('testimoniallist')->with('success', 'Testimonial deleted successfully.');
            } else {
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting testimonial: ' . $e->getMessage());
        }
    }


}
