<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function uploadImageCkeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originname = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($originname, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();
            $filename = $filename . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('storage/images'), $filename);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('storage/images/' . $filename);
            $msg = 'Image Upload Successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
