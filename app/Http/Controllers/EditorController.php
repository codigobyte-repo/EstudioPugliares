<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = $file->getClientOriginalName();
            $path = 'posts';
            $url = Storage::disk('public_images')->put($path, $file);

            /* Intervention Image */
            $ruta = public_path('images/' . $url);

            $InterventionImg = Image::make($file);

            $InterventionImg->resize(1200, null, function ($constraint){
                $constraint->aspectRatio();
            });
            $InterventionImg->save($ruta);
    
            return response()->json([
                'filename' => $filename,
                'uploaded' => 1,
                'url' => asset(Storage::url($url))
            ]);
        }
    }
}
