<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ListItem;
use App\Models\PropertyCategory;
use App\Http\Controllers\PropertyController;

class HomeController extends Controller
{
    public function index()
    {
        $featured = app(\App\Http\Controllers\PropertyController::class)->getFeatured();
        $data=array('featured' => $featured);
        return view('home.index')->with($data);
        // return view('home.index', ['listItems' => ListItem::where('is_complete','=', 0)->get()] );
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
            'locations' => $locationData,
            'properties' => $properties
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
        );

        // dd($property->category->name);

         return view('home.property')->with($data);
    }

    public function contact()
    {
        return view('home.contact');
    }

}
