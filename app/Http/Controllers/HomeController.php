<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ListItem;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyLocation;
use App\Http\Controllers\PropertyController;

class HomeController extends Controller
{
    public function index()
    {
        $data=array(
            'featured' => app(\App\Http\Controllers\PropertyController::class)->getFeatured(),
            'locations' => PropertyLocation::orderBy('name', 'asc')->get(),
            'keyword' => '',
            'selectedlocation' => 0,
            'filtertype' => [],
            'filterstatus' => [],
        );

        return view('home.index')->with($data);
    }

    public function search(Request $request)
    { 
        $query = Property::query();
        $query
            ->leftJoin('property_statuses', function($join) {
                $join->on('properties.stateId', '=', 'property_statuses.id');
            })
            ->leftJoin('property_categories', function($join) {
                $join->on('properties.categoryId', '=', 'property_categories.id');
            });
        $query->where('status', '=', 'published');

        // Keyword
        if($request->keyword) {
            $keywords = explode(' ', $request->keyword);
            $query->when($keywords, function ($query) use ($keywords) {
                $query->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->where('properties.name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('properties.name', 'LIKE', '%' . $keyword . '%');
                    }
                });
            });
        } else {
            $request->keyword = "";
        }
       
        // Location
        if($request->location) {
            $query->where('locationId', '=', $request->location);
        } else {
            $request->location = 0;
        }

        // Type
        if($request->filtertype) {
            $filtertype =  $request->filtertype;
            $query->when($filtertype, function ($query) use ($filtertype) {
                $query->where(function ($query) use ($filtertype) {
                    foreach ($filtertype as $type) {
                        $query->where('categoryId', '=', $type)
                            ->orWhere('categoryId', '=', $type);
                    }
                });
            });
        }
        else {
            $request->filtertype = [];
        }

        // Status
        if($request->filterstatus) {
            $filterstatus = $request->filterstatus;
            $query->when($filterstatus, function ($query) use ($filterstatus) {
                $query->where(function ($query) use ($filterstatus) {
                    foreach ($filterstatus as $state) {
                        $query->where('stateId', '=', $state )
                            ->orWhere('stateId', '=', $state);
                    }
                });
            });
        } else {
            $request->filterstatus = [];
        }

        $properties = $query->select(
            'properties.*', 
            'property_categories.name AS categoryName',
            'property_statuses.name as state')
        ->get();

        $data=array(
            'search' => '0',
            'keyword' => $request->keyword,
            'selectedlocation' => $request->location,
            'filtertype' => $request->filtertype,
            'filterstatus' => $request->filterstatus,
            'properties' => $properties,
            'categories' => PropertyCategory::all(),
            'locations' => PropertyLocation::orderBy('name', 'asc')->get()
        );

        return view('home.search')->with($data);
    }

    public function category()
    {
        $slug = Route::current()->uri(); 
        $category = PropertyCategory::where('slug','=', $slug)->get()->first()->name; 
        $properties = app(PropertyController::class)->getProperties($slug);

        // Convert the array to a collection
        $propertiesCollection = collect($properties);

        // Get unique values of the 'location_name' field, excluding null values
        // $locations = $propertiesCollection->pluck('location_name')
        //     ->filter(function ($location) {
        //         return $location !== null;
        //     })
        //     ->unique()
        //     ->values()
        //     ->all();

        // Filter unique 'locationId'
        $uniqueLocations = $propertiesCollection->filter(function ($location) {
            return $location->locationId !== 0;
        })
        ->unique('locationId')->values();

        // Create a new collection with 'locationId' and 'locationName' fields
        $locationData = $uniqueLocations->map(function ($property) {
            return [
                'locationId' => $property['locationId'],
                'locationName' => $property['locationName'],
            ];
        })->values()->all();

        $data = array(
            'slug' => $slug, 
            'category' => $category,
            'propertyLocations' => $locationData,
            'properties' => $properties,
            'locations' => PropertyLocation::all(),
            'keyword' => '',
            'selectedlocation' => 0,
            'filtertype' => [],
            'filterstatus' => [],
        );

        return view('home.category')->with($data);
    }

    public function property($id)
    {
        $property = app(PropertyController::class)->getProperty($id);
        $properties =  app(PropertyController::class)->getProperties("all");
        $data=array(
            'id' => $id, 
            'property' => $property,
            'properties' => $properties,
            'categories' => PropertyCategory::all(),
            'locations' => PropertyLocation::all(),
            'keyword' => '',
            'selectedlocation' => 0,
            'filtertype' => [],
            'filterstatus' => [],
            'title' => $property->name,
            'meta_keywords' => $property->keywords,
            'meta_description' => $property->description,
        );

        return view('home.property')->with($data);
    }

    public function contact()
    {
        $data=array(
            'locations' => PropertyLocation::all(),
            'keyword' => '',
            'selectedlocation' => 0,
            'filtertype' => [],
            'filterstatus' => [],
        );
        
        return view('home.contact')->with($data);
    }

}
