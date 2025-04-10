<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Service;
use App\Models\Contactus;
use App\Models\Appointment;
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

                return view('pages.remotebookingshow', [
                    'layout' => 'side-menu',
                    'booking' => $booking,
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
                    $query->where('service_name', 'LIKE', '%' . $searchString . '%');
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
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
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

                return redirect()->back()->with('success', 'Service updated successfully');
            } else {
                return redirect('/admin/login');
            }
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }



}