<?php

namespace App\Http\Controllers\frontend;

use App\Models\Service;
use App\Models\Contactus;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\RemoteBooking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageManagementController extends Controller
{

    public function privacyPolicy(Request $request)
    {

        try {

            $privacy = DB::table('pages')->where('type', 'privacy')->first();
            return view('frontend.pages.privacy-policy', compact('privacy'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function termscondition(Request $request)
    {

        try {

            $terms = DB::table('pages')->where('type', 'terms')->first();
            return view('frontend.pages.terms-condition', compact('terms'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    #------------------------------------------------------------------------------------------------------------------------------------------

    public function aboutus(Request $request)
    {

        try {

            $aboutus = DB::table('pages')->where('type', 'aboutus')->first();
            $testimonials = \Illuminate\Support\Facades\DB::table('testimonials')->where('status', 'active')->latest()->limit(3)->get();
            return view('v2.frontend.pages.aboutus', compact('aboutus', 'testimonials'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }


    #-------------------------------------------------------------------------------------------------------------------------
    public function contactUS(Request $request)
    {
        try {
            $sitenumber = DB::table('systemflag')
                ->where('name', 'sitenumber')
                ->value('value');

            $siteemail = DB::table('systemflag')
                ->where('name', 'siteemail')
                ->value('value');

            $siteaddress = DB::table('systemflag')
                ->where('name', 'siteaddress')
                ->value('value');

            $appName = DB::table('systemflag')
                ->where('name', 'AppName')
                ->select('value')
                ->first();

            $full_address = urlencode("{$appName->value},{$siteaddress}");

            // Google Maps Embed URL without API Key
            $map_url = "https://www.google.com/maps?q={$full_address}&output=embed";



            return view('v2.frontend.pages.contactus', compact('sitenumber', 'siteemail', 'siteaddress', 'appName', 'map_url'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    #-------------------------------------------------------------------------------------------------------------------------
    public function SavecontactUS(Request $request)
    {
        // dd($request->all());
        // dd(sess)
        $request->validate([
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_message' => 'required',
        ]);

        ContactUs::create([
            'contact_name' => $request->contact_name,
            'contact_email' => $request->contact_email,
            'contact_message' => $request->contact_message,
        ]);

        // return response()->json(['success' => 'Form submitted successfully!'], 200);
        return redirect()->route('front.contact')->with('success', 'Form submitted successfully!');
    }



    #-------------------------------------------------------------------------------------------------------------------------



    public function remoteBooking(Request $request)
    {
        try {
            $services = Service::all(); // fetch all services

            return view('v2.frontend.pages.remotebooking', compact('services'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }

    public function saveRemoteBooking(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'birthdate' => 'required',
            'birthtime' => 'required',
            'birthplace' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'google_location' => 'required',
            'layout_map' => 'required|file',
            'compass_reading' => 'required|file',
            'property_video' => 'nullable|file',
            'additional_notes' => 'nullable|string',
        ]);

        // File uploads
        $layoutMap = $request->file('layout_map')->store('uploads/remote_booking', 'public');
        $compassReading = $request->file('compass_reading')->store('uploads/remote_booking', 'public');
        $propertyVideo = $request->hasFile('property_video')
            ? $request->file('property_video')->store('uploads/remote_booking', 'public')
            : null;

        RemoteBooking::create([
            'fullname' => $request->fullname,
            'birthdate' => $request->birthdate,
            'birthtime' => $request->birthtime,
            'birthplace' => $request->birthplace,
            'city' => $request->city,
            'address' => $request->address,
            'google_location' => $request->google_location,
            'layout_map' => $layoutMap,
            'compass_reading' => $compassReading,
            'property_video' => $propertyVideo,
            'additional_notes' => $request->additional_notes,
        ]);

        return back()->with('success', 'Remote booking submitted successfully.');
    }


    public function appointment()
    {
        $testimonials = \Illuminate\Support\Facades\DB::table('testimonials')->where('status', 'active')->latest()->limit(3)->get();

        return view('v2.frontend.pages.appointment', [
            'testimonials' => $testimonials,
        ]);
    }


    public function saveAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
            'time_of_day' => 'nullable|in:morning,afternoon,evening',
            'way_to_reach' => 'nullable|in:phone,email',
            'day' => 'nullable|numeric|min:1|max:31',
            'month' => 'nullable|numeric|min:1|max:12',
            'year' => 'nullable|numeric|min:1900',
            'hrs' => 'nullable|numeric|min:0|max:23',
            'mins' => 'nullable|numeric|min:0|max:59',
            'secs' => 'nullable|numeric|min:0|max:59',
            'address' => 'nullable|string',
            'reason' => 'nullable|string',
        ]);

        // Filter out fields with empty string values
        $data = collect($request->only([
            'name',
            'email',
            'mobile',
            'gender',
            'time_of_day',
            'way_to_reach',
            'address',
            'reason',
        ]))->filter(function ($value) {
            return $value !== '';
        })->toArray();

        // Combine date and time if available and valid
        $preferred_date = $request->year !== '' && $request->month !== '' && $request->day !== ''
            ? $request->year . '-' . str_pad($request->month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->day, 2, '0', STR_PAD_LEFT)
            : null;

        $preferred_time = $request->hrs !== '' && $request->mins !== '' && $request->secs !== ''
            ? str_pad($request->hrs, 2, '0', STR_PAD_LEFT) . ':' . str_pad($request->mins, 2, '0', STR_PAD_LEFT) . ':' . str_pad($request->secs, 2, '0', STR_PAD_LEFT)
            : null;

        // Add date and time only if not null
        if ($preferred_date) {
            $data['preferred_date'] = $preferred_date;
        }

        if ($preferred_time) {
            $data['preferred_time'] = $preferred_time;
        }

        Appointment::create($data);

        return redirect()->back()->with('success', 'Appointment submitted successfully.');
    }





    // public function services(Request $request)
    // {
    //     try {
    //         // Fetch all services
    //         $services = Service::latest()->get();

    //         return view('v2.frontend.pages.services', compact('services'));
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => $e->getMessage(),
    //             'status' => 500,
    //         ], 500);
    //     }
    // }

    public function services(Request $request)
    {
        try {
            // Check if service_no is passed
            $limit = $request->get('service_no');

            // Fetch all or limited services
            $services = Service::latest();
            if ($limit) {
                $services = $services->take($limit);
            }

            $services = $services->get();
            $testimonials = \Illuminate\Support\Facades\DB::table('testimonials')->where('status', 'active')->latest()->limit(3)->get();

            return view('v2.frontend.pages.services', compact('services', 'testimonials'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }


    public function serviceShow(Request $request)
    {
        try {
            $id = $request->query('id'); // or just $request->id
            $service = Service::findOrFail($id);
            // dd($service);
            // dd(asset('public/js/jquery.min.js'));
            return view('v2.frontend.pages.servicedetail', compact('service'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Service not found.');
        }
    }


}