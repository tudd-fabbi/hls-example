<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg\Format\Video\X264;
use ProtoneMedia\LaravelFFMpeg\Exporters\HLSVideoFilters;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Exception;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function convertMp4ToM3u8(Request $request)
    {
        try {
            $file = $request->file('file');
            $originalname = $file->getClientOriginalName();
            $path = $file->storeAs('/uploads/videos', $originalname);
            dd($path);
            // $lowFormat  = (new X264('aac'))->setKiloBitrate(100);
            // $highFormat = (new X264('aac'))->setKiloBitrate(3000);


            // FFMpeg::fromDisk('uploads')
            //     ->open($path)
            //     ->exportForHLS()
            //     ->addFormat($highFormat)
            //     ->toDisk('video_public')
            //     ->save('videos/redfield.m3u8');

            // File::delete(storage_path('uploads') . '/' . $path);
            
            return "success";
        } catch (Exception $e) {
            dd($e);
        }
    }
}
