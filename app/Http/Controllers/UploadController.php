<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function store(Request $request) 
    {
        $hasThumbnail = false;
        $sizeLimit = collect([]);
        $folder = $request['propertyEntry'];

        if($request->hasFile(key:'ContentBanner') ) 
        {
            $file = $request->file(key:'ContentBanner');
            $hasThumbnail = true;
            $sizeLimit->push(2);
        }

        if($request->hasFile(key:'ContentTypeMedia') ) 
        {
            $file = $request->file(key:'ContentTypeMedia');
            $hasThumbnail = true;
            $sizeLimit->push(1);
            $sizeLimit->push(2);
            $sizeLimit->push(3);
        }

        if($request->hasFile(key:'ContentGallery') ) 
        {
            $file = $request->file(key:'ContentGallery');
        }
        
        $filename = $file->getClientOriginalName();
        $filePath = $file->storeAs('public/tmp/'. $folder, $filename);

        // *** Create a thumbnail
        if($hasThumbnail) {

            $saveDirectory = 'public/tmp/'.$folder.'/thumbnail';
            Storage::makeDirectory($saveDirectory);

            // Provide the path to the existing image
            $imagePath = Storage::path($filePath);
 
            if ($sizeLimit->contains(1)) 
            {
                // *** Large ***
                $image = Image::make($imagePath);

                // Resize the image to your desired dimensions
                $image->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                }); 

                // Save thumbnail
                $savingPath = Storage::path($saveDirectory.'/lg-'.$filename);
                $image->save($savingPath);
            }

            if ($sizeLimit->contains(2)) 
            {
                // *** Medium ***
                $image = Image::make($imagePath);

                // Resize the image to your desired dimensions
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Save thumbnail
                $savingPath = Storage::path($saveDirectory.'/md-'.$filename);
                $image->save($savingPath);
            }

            if ($sizeLimit->contains(3)) 
            {
                // *** Small ***
                $image = Image::make($imagePath);

                // Resize the image to your desired dimensions
                $image->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                }); 

                // Save thumbnail
                $savingPath = Storage::path($saveDirectory.'/sm-'.$filename);
                $image->save($savingPath);
            }

        }
        
        // Return the file paths as JSON
        return response()->json([
            'data' => 'success'
        ]);

    }

    public function index() {
        return 'Hello';
    }
}
