<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AstrologerModel\AstrologyVideo;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


if (!defined('LOGINPATH')) {
    define('LOGINPATH', '/admin/login');
}
class AdsVideoController extends Controller
{
    public $path;
    public $limit = 6;
    public $paginationStart;
    public function addAdsVideo()
    {
        return view('pages.adsVideo');
    }

    public function addAdsVideoApi(Request $req)
    {
        try {
            if (Auth::guard('web')->check()) {
                $req->validate([
                    'youtubeLink' => 'required|url',
                    'videoTitle' => 'required|string',
                    'coverImage' => 'required|string|starts_with:data:image'
                ]);

                $imageData = $req->coverImage;

                // Extract base64 and extension
                [$type, $imageBase64] = explode(';base64,', $imageData);
                $extension = explode('/', $type)[1];

                $imageBinary = base64_decode($imageBase64);
                if ($imageBinary === false) {
                    throw new Exception('Invalid image data');
                }

                // Generate filename and directory
                $time = Carbon::now()->timestamp;
                $imageName = 'coverImage_' . $time . '.' . $extension;
                $publicFolder = public_path('storage/images');

                if (!file_exists($publicFolder)) {
                    mkdir($publicFolder, 0755, true);
                }

                $fullPath = $publicFolder . DIRECTORY_SEPARATOR . $imageName;
                file_put_contents($fullPath, $imageBinary);

                $dbPath = 'public/storage/images/' . $imageName;

                AstrologyVideo::create([
                    'youtubeLink' => $req->youtubeLink,
                    'coverImage' => $dbPath,
                    'videoTitle' => $req->videoTitle,
                    'createdBy' => auth()->user()->id,
                    'modifiedBy' => auth()->user()->id,
                ]);

                return redirect()->route('adsVideos')->with('success', 'Video added successfully');
            } else {
                return redirect(LOGINPATH);
            }
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    //Get
    public function getAdsVideo(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = $request->page ?? 1;
                $paginationStart = ($page - 1) * $this->limit;

                $adsVideo = AstrologyVideo::orderBy('id', 'DESC')
                    ->skip($paginationStart)
                    ->take($this->limit)
                    ->get();

                $adsVideoCount = AstrologyVideo::count();

                $totalPages = ceil($adsVideoCount / $this->limit);
                $totalRecords = $adsVideoCount;
                $start = ($this->limit * ($page - 1)) + 1;
                $end = min(($this->limit * $page), $totalRecords);

                return view(
                    'pages.adsVideo',
                    compact('adsVideo', 'totalPages', 'totalRecords', 'start', 'end', 'page')
                );
            } else {
                return redirect(LOGINPATH);
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    //Edit

    public function editAdsVideo()
    {
        return view('pages.adsVideo');
    }

    public function editAdsVideoApi(Request $req)
    {
        try {
            if (Auth::guard('web')->check()) {
                $req->validate([
                    'filed_id' => 'required|integer',
                    'youtubeLink' => 'required|url',
                    'videoTitle' => 'required|string',
                    'coverImage' => 'nullable|string',
                ]);

                $adsVideo = AstrologyVideo::find($req->filed_id);
                if (!$adsVideo) {
                    return back()->with('error', 'Video not found');
                }

                $coverImage = $adsVideo->coverImage; // fallback to old image path

                if ($req->has('coverImage') && Str::startsWith($req->coverImage, 'data:image')) {
                    // New base64 image provided
                    [$type, $imageBase64] = explode(';base64,', $req->coverImage);
                    $extension = explode('/', $type)[1];

                    $imageBinary = base64_decode($imageBase64);
                    if ($imageBinary === false) {
                        throw new Exception('Invalid image data');
                    }

                    // Delete old image if exists
                    if ($adsVideo->coverImage && File::exists(public_path($adsVideo->coverImage))) {
                        File::delete(public_path($adsVideo->coverImage));
                    }

                    // Save new image
                    $time = Carbon::now()->timestamp;
                    $imageName = 'coverImage_' . $req->filed_id . '_' . $time . '.' . $extension;
                    $publicFolder = public_path('storage/images');

                    if (!file_exists($publicFolder)) {
                        mkdir($publicFolder, 0755, true);
                    }

                    $fullPath = $publicFolder . DIRECTORY_SEPARATOR . $imageName;
                    file_put_contents($fullPath, $imageBinary);

                    $coverImage = 'public/storage/images/' . $imageName;
                }

                $adsVideo->youtubeLink = $req->youtubeLink;
                $adsVideo->videoTitle = $req->videoTitle;
                $adsVideo->coverImage = $coverImage;
                $adsVideo->modifiedBy = auth()->user()->id;
                $adsVideo->save();

                return redirect()->route('adsVideos')->with('success', 'Video updated successfully');
            } else {
                return redirect(LOGINPATH);
            }

        } catch (Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function videoStatus(Request $request)
    {
        return view('pages.adsVideo');
    }

    public function videoStatusApi(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $adsVideo = AstrologyVideo::find($request->status_id);
                if ($adsVideo) {
                    $adsVideo->isActive = !$adsVideo->isActive;
                    $adsVideo->update();
                }
                return redirect()->route('adsVideos');
            } else {
                return redirect(LOGINPATH);
            }

        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function deleteVideo(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                AstrologyVideo::find($request->del_id)->delete();
                return redirect()->route('adsVideos');
            } else {
                return redirect(LOGINPATH);
            }

        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }
}
