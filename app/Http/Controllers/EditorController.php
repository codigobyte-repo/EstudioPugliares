<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = $file->getClientOriginalName();
            $path = 'posts';
            $url = Storage::disk('public_images')->put($path, $file);
    
            return response()->json([
                'filename' => $filename,
                'uploaded' => 1,
                'url' => asset(Storage::url($url))
            ]);
        }
    }
}
