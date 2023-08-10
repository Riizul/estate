<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyLocation;

class LocationController extends Controller
{
    public function index()
    {
        $data=array(
            'locations' => PropertyLocation::all()
        );

        return view('location.index')->with($data);
    }

    public function store(Request $request)
    {
        if($request->action == "add") {
            $location = new PropertyLocation;
            $location->name = $request->name;
        }
        else {
            $location = PropertyLocation::find($request->locationId);
            $location->name = $request->name;
        }

        $location->save();

        return redirect()
            ->route('location.index')
            ->withSuccess(__('Saved successfully.')); 
    }

    public function destroy($id) 
    {
        $location = PropertyLocation::find($id); 
        $location->delete();

        return redirect()
            ->route('location.index');
    }
}
