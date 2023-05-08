<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request) {

        if($request->hasFile(key:'ContentTypeMedia') ) {
            $file = $request->file(key:'ContentTypeMedia');
            $filename = $file->getClientOriginalName();
            $folder = $request['propertyEntry'];
            $file->storeAs('public/tmp/'. $folder, $filename);

            return $folder;
        }

        if($request->hasFile(key:'ContentGallery') ) {
            $file = $request->file(key:'ContentGallery');
            $filename = $file->getClientOriginalName();
            $folder = $request['propertyEntry'];
            $file->storeAs('public/tmp/'. $folder, $filename);
       

            // if($request->has(key:'id')) {
            //     return "naa";
            // }

            return $folder;
        }

        if($request->hasFile(key:'ContentBanner') ) {
            $file = $request->file(key:'ContentBanner');
            $filename = $file->getClientOriginalName();
            $folder = $request['propertyEntry'];
            $file->storeAs('public/tmp/'. $folder, $filename);

            return $folder;
        }
        
        return '';

    }

    public function index() {
        return 'Hello';
    }
}
