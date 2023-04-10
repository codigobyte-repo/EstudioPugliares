<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filename = $filename . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $filename);

            $url = asset('media/' . $filename);

            return response()->json(['filename' => $filename, 'uploaded' => 1, 'url' => $url]);

        }
    }
}
