<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DownloadFilesController extends Controller
{
    public function downloadCV($file)
    {
        if(Storage::disk('cv')->exists($file))
        {
            $path = Storage::disk('cv')->path($file);
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }

    public function downloadCoverLetter($file)
    {
        if(Storage::disk('cl')->exists($file))
        {
            $path = Storage::disk('cl')->path($file);
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
