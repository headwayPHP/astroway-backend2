<?php


namespace App\Http\Controllers\mobile;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\House;
use App\Models\Society;
use App\Models\UserDevice;
use Illuminate\Http\Request;
use App\Services\CurlApiService;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\mobile\ApiController;


class AuthController extends Controller
{

    protected $apiController;
    protected $curlApiService;
    protected $base_url;

    public function __construct(ApiController $apiController, CurlApiService $curlApiService)
    {
        $this->apiController = $apiController;
        $this->curlApiService = $curlApiService;
        $this->base_url = env('API_BASE_URL',); // Set default if env is missing
    }


    // public function sendOtp(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'device_type' => 'required',
    //         'phone_number' => 'required|digits:10',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'message' => $validator->errors()->first(),
    //             'status' => false,
    //             'data' => []
    //         ]);
    //     }

    //     $deviceType = $request->input('device_type');
    //     $countryCode = '91';
    //     $phoneNumber = $request->input('phone_number');
    //     $fullPhoneNumber = $countryCode . $phoneNumber;


    //     if ($validator) {
    //         return response()->json([
    //             'message' => 'OTP sent successfully',
    //             'status' => true,
    //             'data' => []
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => 'Failed to send OTP',
    //             'status' => false,
    //             'data' => []
    //         ]);
    //     }
    // }

    public function sendOtp(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required|min:10|digits:10',
                'country_code' => 'required|digits:2',
            ]);

            if ($validator->fails()) {
                $result['status'] = false;
                $result['message'] = $validator->errors()->first();
                $result['data'] = (object) [];
                return response()->json($result, 200);
            }

            $mobile = $request->phone_number;
            $base_url = $this->base_url;
            $otp = rand(1000, 9999);
            $otpExpiresAt = Carbon::now()->addMinutes(1);
            DB::enableQueryLog();

            // Send OTP via SMS
            $phoneNumber = $mobile;
            $optionalKey = $request->hashKey;
            $chkUserData = User::where('mobile', $mobile)->where('status', 1)->first();

            // $message = 'Your login OTP is ' . $otp . '. Headway Business Solutions' . $optionalKey . '';
            // $message = 'Your login OTP is ' . $otp . '. Smart Chokidar' . $optionalKey . '';
            $message = "Dear Customer,
                        Your MyBzB Login OTP is {$otp}.
                        Do not share this code with anyone.
                        https://mybzb.com/
                        MYBZBO";
            $data['SenderID'] = env('SENDER_ID');
            $data['SMSType'] = 4;
            $data['Mobile'] = $phoneNumber;
            $data['EntityID'] = env('API_ENTITY_ID');
            $data['TemplateID'] = env('API_Template_ID');
            $data['MsgText'] = $message;
            // dd($data);
            if ($chkUserData) {
                if ($mobile != '9879879879' && $mobile != '7874600096' && $mobile != '7567300096' && $mobile != '7874500096') { // remove once live apk
                    $chkUserData->otp = $otp;
                    $chkUserData->otp_expires_at = $otpExpiresAt;
                    $chkUserData->save();
                    // dd(env('API_KEY'));
                    $response = $this->curlApiService->postRequest(env('API_KEY'), $data);
                    if (is_array($response)) {
                        $response = json_encode($response); // Convert array to string
                    }
                    // dd($response);
                    if (is_string($response) && strpos($response, "ok") !== false) {
                        $result['status'] = true;
                        $result['message'] = "OTP SEND";
                        $result['data'] = (object) [];
                        // return response()->json($result, 200);
                    } else {
                        $result['status'] = false;
                        $result['message'] = "OTP NOT SEND" . $response;
                        $result['data'] = (object) [];
                        // return response()->json($result, 200);
                    }
                } else {
                    $data = [];
                    $chkUserData->otp = '0096';
                    $chkUserData->otp_expires_at = $otpExpiresAt;
                    $chkUserData->save();
                }
            } else {

                $response = $this->curlApiService->postRequest(env('API_KEY'), $data);
                if (is_array($response)) {
                    $response = json_encode($response); // Convert array to string
                }
                if (is_string($response) && strpos($response, "ok") !== false) {
                    $result['status'] = true;
                    $result['message'] = "OTP SEND";
                    $result['data'] = (object) [];
                    // return response()->json($result, 200);
                } else {
                    $result['status'] = false;
                    $result['message'] = "OTP NOT SEND" . $response;
                    $result['data'] = (object) [];
                    // return response()->json($result, 200);
                }
                $chkUser = new User();
                $chkUser->otp = $otp;
                $chkUser->mobile = $phoneNumber;
                $chkUser->otp_expires_at = $otpExpiresAt;
                $chkUser->password = Hash::make('123456');
                $chkUser->save();
            }
            $chkUserData = User::where('mobile', $mobile)->where('status', 1)->get();
            $data = $chkUserData->map(function ($user) use ($base_url, $otp) {
                return collect($user)->except(['password', 'email_verified_at', 'otp', 'otp_expires_at', 'remember_token'])
                    ->put('user_id', $user['id'])
                    ->put('otp', $otp)
                    // ->put('avatar', ($user['avatar']) ? $base_url . $this->profile_path . $user['avatar'] : '')
                    ->toArray();
            })->first();


            return response()->json(['status' => true, 'message' => 'OTP sent successfully!', 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Something went wrong', 'error' => $th->getMessage()], 200);
        }
    }



    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_type' => 'required',
            'phone_number' => 'required|digits:10',
            'otp' => 'required|digits:4',
            'country_code' => 'required',
            'device_token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => false,
                'data' => (object) []
            ]);
        }

        $validatedData = $validator->validated();


        // dd(User::where('mobile', $request->phone_number)->first()->otp);
        //TODO: otp expires at check here.
        if ($request->otp === User::where('mobile', $request->phone_number)->first()->otp) {
            $user = User::where('mobile', $request->phone_number)->latest()->first();
            if ($user) {
                if ($user->is_user_approved == "Approved" && $user->status == 'Inactive') {
                    $newUser = User::create([
                        'mobile' => $request->phone_number,
                        'status' => 'Inactive',
                        'otp' => $request->otp,
                        'first_name' => null,
                        'last_name' => null,
                    ]);

                    $this->storeDeviceDetails($newUser->id, $request);

                    $token = JWTAuth::fromUser($newUser);

                    return response()->json([
                        'message' => 'OTP verified successfully, new user created',
                        'status' => true,
                        'data' => [
                            'is_society_approved' => optional($newUser->society)->is_society_approved == 'Approved' ? true : false,
                            'isNewUser' => $newUser->society_id ? false : true,
                            'is_user_approved' => $newUser->is_user_approved,
                            'user_name' => null,
                            'profile_photo' => config('app.url') . '/storage/' . $newUser->profile_photo,
                            'role_id' => null,
                            'role_name' =>  null,
                            'phone_number' => $newUser->mobile,
                            'country_code' => $request->country_code,
                            'email' => $newUser->email,
                            'user_id' => $newUser->id,
                            'token' => $token,
                            'society_name' => null,
                            'flat_houseNo' => null,
                            'block' => null,
                        ]
                    ]);
                }
                $token = JWTAuth::fromUser($user);

                $society = Society::find($user->society_id);
                $house = House::find($user->house_id);
                $this->storeDeviceDetails($user->id, $request);

                $userDetails = $user->toArray();
                $societyData = $society ? $society->only(['society_name']) : null;
                $houseData = $house ? $house->only(['house_no', 'block']) : null;

                return response()->json([
                    'message' => 'OTP verified successfully',
                    'status' => true,
                    'data' => [
                        'is_society_approved' => optional($user->society)->is_society_approved == 'Approved' ? true : false,
                        'isNewUser' => $user->society_id ? false : true,
                        'is_user_approved' => $user->is_user_approved,
                        'user_name' => $user->first_name . ' ' . $user->last_name,
                        'society_id' => $user->society_id,
                        'profile_photo' => config('app.url') . '/storage/' . $user->profile_photo,
                        'role_id' => $user->role_id,
                        'role_name' => Role::where('id', $user->role_id)->pluck('name')->first(),
                        'phone_number' => $user->mobile,
                        'country_code' => $request->country_code,
                        'email' => $user->email,
                        'user_id' => $user->id,
                        'token' => $token,
                        'society_name' => $societyData ? $societyData['society_name'] : null,
                        'flat_houseNo' => $houseData ? $houseData['house_no'] : null,
                        'block' => $houseData ? $houseData['block'] : null,
                    ]
                ]);
            } else {
                $newUser = User::create([
                    'mobile' => $request->phone_number,
                    'status' => 'Inactive',
                    // 'otp' => '0096',
                    'otp' => $request->otp,
                    'first_name' => null,
                    'last_name' => null,
                ]);

                $this->storeDeviceDetails($newUser->id, $request);

                $token = JWTAuth::fromUser($newUser);

                return response()->json([
                    'message' => 'OTP verified successfully, new user created',
                    'status' => true,
                    'data' => [
                        'is_society_approved' => optional($user->society)->is_society_approved == 'Approved' ? true : false,
                        'isNewUser' => $newUser->society_id ? false : true,
                        'is_user_approved' => $newUser->is_user_approved,
                        'user_name' => null,
                        'profile_photo' => config('app.url') . '/storage/' . $newUser->profile_photo,
                        'role_id' => null,
                        'role_name' =>  null,
                        'phone_number' => $newUser->mobile,
                        'country_code' => $request->country_code,
                        'email' => $newUser->email,
                        'user_id' => $newUser->id,
                        'token' => $token,
                        'society_name' => null,
                        'flat_houseNo' => null,
                        'block' => null,
                    ]
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Failed to verify OTP',
                'status' => false,
                'data' => (object) []
            ]);
        }
    }


    private function storeDeviceDetails($userId, $request)
    {
        UserDevice::create([
            'user_id' => $userId,
            'device_token' => $request->device_token,
            'device_type' => $request->device_type,
            'api_version' => $request->api_version ?? null,
            'app_version' => $request->app_version ?? null,
            'os_version' => $request->os_version ?? null,
            'device_model_name' => $request->device_model_name ?? null,
            'app_language' => $request->app_language ?? null,
            'status' => 'Active',
        ]);
    }
}
