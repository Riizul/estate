<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyCategory;
use App\Models\PropertyInformation;
use App\Models\PropertyLocation;
use App\Models\PropertyGallery;
use App\Models\PropertyStatus;
use App\Models\ContentTypeBuilder;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    public function index() {
        $property = Property::leftJoin('property_categories', function($join) {
            $join->on('properties.categoryId', '=', 'property_categories.id');
          })
          ->where("properties.status",'!=', "deleted")
          ->get([
              'properties.id',
              'properties.name',
              'properties.location',
              'property_categories.name AS categoryName',
              'properties.status'
          ]);


        $propertyTypes = PropertyType::all();
        $data=array(
            'properties' => $property,
            'propertyTypes'=>$propertyTypes, 
            'instructors'=> 'Boy Butyok');

        return view('property.index')->with($data);
    }

    public function create() 
    {
        $data=array(
            'propertyTypes' => PropertyType::all(),
            'propertyCategories' => PropertyCategory::all(),
            'propertyStatuses' => PropertyStatus::all(),
            'contentTypeBuilder' => ContentTypeBuilder::where("id",'!=', '3')->get(),
            'locations' => PropertyLocation::all(),
            'propertyToken' => uniqid() . '_' . now()->timestamp
        );
            
        return view('property.create')->with($data);
    }

    public function publish($id) 
    {
        $property = Property::find($id);
        $property->status = "published";
        $property->save();

        return redirect()
            ->route('content.index');
    }

    public function destroy($id) 
    {
        $property = Property::find($id);
        $property->status = "deleted";
        $property->save();

        return redirect()
            ->route('content.index');
    }

    public function show($id) 
    {
        $property = Property::find($id);
        $property->status = "draft";
        $property->save();

        return redirect()
            ->route('content.index');
    }

    public function store(Request $request)
    {
        $property = new Property;
        $property->typeId = $request->type;
        $property->categoryId = $request->category;
        $property->stateId = $request->status;
        $property->name = $request->name;
        $property->locationId = $request->locationId;
        $property->location =  $request->location;
        $property->price =  is_null($request->price)? "" : $request->price;
        $property->keywords =  $request->keywords;
        $property->description =  $request->description;
        $property->slug =  $this->slugify($request->name);
        $property->uri =  '/' . $this->slugify(PropertyCategory::where('id','=', $request->category)->get()->first()->name) . '/' . $this->slugify($request->name);
        $property->banner = $request->propertyBanner;
        $property->featured = $request->featured;
        $property->status = 'draft';
        $property->token = $request->propertyToken;
        $property->save();

        $propertyContent = json_decode($request->propertyContentBuilder, true);
        foreach ($propertyContent as $item){  
            $information = new PropertyInformation;
            $information->propertyId = $property->id;
            $information->contentTypeId = $item['contentTypeId'];
            $information->sort = $item['sort'];

            switch ($item['contentTypeId']) {
                case 1:
                case 2:
                    $information->value =str_replace("\n","", $item['value']);
                    break;
                default:
                    $information->value = json_encode($item['value']);
            }

            if (array_key_exists('attribute', $item)) 
                $information->attribute = json_encode($item['attribute']);
            else
                $information->attribute = "";

            $information->save();
        }

        $propertyGallery = json_decode($request->propertyGallery, true);
        foreach ($propertyGallery as $item){  
 
            $file = new PropertyGallery;
            $file->propertyId = $property->id;
            $file->filename = $item['filename'];
            $file->source = $item['source'];
            $file->size = $item['size'];
            $file->extention = $item['extention'];
            $file->save();
        }

        return redirect()
            ->route('content.index')
            ->withSuccess(__('created successfully.'));        
    }

    public function edit($property) 
    {
        $propertyContent = PropertyInformation::where("propertyId",'=', $property)->orderByRaw('sort asc')->get();

        return view('property.edit', [
            'property' => Property::where("id",'=', $property)->get()->first(),
            'propertyTypes' => PropertyType::all(),
            'propertyCategories' => PropertyCategory::all(),
            'propertyStatuses' => PropertyStatus::all(),
            'locations' => PropertyLocation::all(),
            'contentTypeBuilder' => ContentTypeBuilder::all(),
            'propertyGallery' => PropertyGallery::where("propertyId",'=', $property)->get(),
            'propertyContent' => $propertyContent,
            'parseContent' => json_encode($propertyContent)
        ]);
    }

    public function slugify($text)
    {
        $divider = '-';

        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function update(Request $request, $id)
    {
        //Information
        $property = Property::find($id);
        $property->typeId = $request->type;
        $property->categoryId = $request->category;
        $property->stateId = $request->status;
        $property->name = $request->name;
        $property->locationId = $request->locationId;
        $property->location =  $request->location;
        $property->price =  is_null($request->price)? "" : $request->price;
        $property->keywords =  $request->keywords;
        $property->description =  $request->description;
        $property->slug =  $this->slugify($request->name);
        $property->uri =  '/' . $this->slugify(PropertyCategory::where('id','=', $request->category)->get()->first()->name) . '/' . $this->slugify($request->name);
        $property->banner = $request->propertyBanner;
        $property->featured = $request->featured;
        $property->save();

        //Information
        PropertyInformation::where("propertyId",'=', $id)->delete();
        $propertyContent = json_decode($request->propertyContentBuilder, true);
        foreach ($propertyContent as $item){  
            $information = new PropertyInformation;
            $information->propertyId = $property->id;
            $information->contentTypeId = $item['contentTypeId'];
            $information->sort = $item['sort'];

            switch ($item['contentTypeId']) {
                case 1:
                case 2:
                    $information->value =str_replace("\n","", $item['value']);
                    break;
                default:
                    $information->value = json_encode($item['value']);
            }

            if (array_key_exists('attribute', $item)) 
                $information->attribute = json_encode($item['attribute']);
            else
                $information->attribute = "";

            $information->save();
        }

        //Gallery
        PropertyGallery::where("propertyId",'=', $id)->delete();
        $propertyGallery = json_decode($request->propertyGallery, true);
        foreach ($propertyGallery as $item){  
            $file = new PropertyGallery;
            $file->propertyId = $property->id;
            $file->filename = $item['filename'];
            $file->source = $item['source'];
            $file->size = $item['size'];
            $file->extention = $item['extention'];
            $file->save();
        }

        return redirect('/content/'. $id. '/edit');
    }

    public function getProperties($id) 
    {
        switch ($id) {
            case "house-and-lot":
                $category = 1;
                break;
            case "condominium":
            case "condominiums":
                $category = 2;
                break;
            case "for-rent":
                $category = 3;
                break;
            default:
                return Property::where("status",'=', 'published')->get(); 
        }

        $properties = Property::leftJoin('property_locations', function($join) {
                $join->on('properties.locationId', '=', 'property_locations.id');
            })
            ->leftJoin('property_statuses', function($join) {
                $join->on('properties.stateId', '=', 'property_statuses.id');
            })
            ->where([
                ["categoryId",'=', $category],
                ["status",'=', 'published'],
            ])
            ->select(
                'properties.*', 
                'property_locations.name as locationName',
                'property_statuses.name as state')
            ->get();

        foreach ($properties as $item){ 
            $item->category = PropertyCategory::where('id','=', $item->categoryId)->get()->first();
        }

        return $properties;
    }

    public function getProperty($id) {
        return $this->build(Property::where("slug", "=", $id)->get()->first()); 
    }

    public function getFeatured() {
        // $properties = Property::where([
        //     ["featured",'=', 1],
        //     ["status",'=', 'published'],
        // ])->get();

        /**BTK
         * property_statuses add SOLD OUT, RE OPEN, RENTED, AVAILABLE
        */

        $properties = Property::leftJoin('property_statuses', function($join) {
            $join->on('properties.stateId', '=', 'property_statuses.id');
        })
        ->where([
            ["featured",'=', 1],
            ["status",'=', 'published'],
        ])
        ->select('properties.*', 'property_statuses.name as state')
        ->get();

        foreach ($properties as $item){ 
            $item->Seo = [ 
                'metaTitle'=> $item->name,
                'metaDescription'=> $item->description,
                'shareImage' => $item->banner
            ];

            $item->category = PropertyCategory::where('id','=', $item->categoryId)->get()->first();
        }
        return $properties;
    }

    public function getCategory($arg) {

        switch ($arg) {
            case "house-and-lot":
                $category = 1;
                break;
            case "condominiums":
                $category = 2;
                break;
            case "for-rent":
                $category = 3;
                break;
        }

        return $properties = Property::where([
            ["categoryId",'=', $category],
            ["status",'=', 'published'],
        ])->get();

    }

    private function build($property)
    {
        $property->category = PropertyCategory::where('id','=', $property->categoryId)->get()->first();
        $property->type = PropertyType::where('id','=', $property->typeId)->get()->first();
        $property->status = PropertyStatus::where('id','=', $property->stateId)->get()->first();
        $property->contents = PropertyInformation::where("propertyId",'=', $property->id)->orderByRaw('sort asc')->get();
        
        $gallery = PropertyGallery::where("propertyId",'=', $property->id)->get();
        $slider = array();
        foreach ($gallery as $item){ 
            array_push($slider, "http://127.0.0.1:8000/storage/tmp". $item['source']);
        }
        $property->gallery = $gallery;
        $property->slider = $slider;

        $property->Seo = [ 
            'metaTitle'=> $property->name,
            'metaDescription'=> $property->description,
            'shareImage' => $property->banner
        ];
        

        return $property;
    }

    public function publishPropety($id) {
        $property = Property::find($id);
        $property->status = "published";
        $property->save();
        return "success";
    }

    public function draftPropety($id) {
        $property = Property::find($id);
        $property->status = "draft";
        $property->save();
        return "success";
    }

    public function deleteProperty($id) {
        $property = Property::find($id);
        $property->status = "deleted";
        $property->save();
 
        return "deleted successfully";
    }

}
