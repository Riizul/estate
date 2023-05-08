<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\PropertyStatus;
use App\Models\PropertyInformation;

use App\Models\PropertyGallery;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index(){
        return view('home.index', ['listItems' => ListItem::all()] );
    }

    public function getTodoList() {
        $properties = Property::all();
        
        foreach ($properties as $item){ 
            $item->category = PropertyCategory::where('id','=', $item->categoryId)->get()->first();
            $item->type = PropertyType::where('id','=', $item->typeId)->get()->first();
            $item->status = PropertyStatus::where('id','=', $item->stateId)->get()->first();
            $item->contents = PropertyInformation::where("propertyId",'=', $item->id)->orderByRaw('sort asc')->get();
            $item->gallery = PropertyGallery::where("propertyId",'=', $item->id)->get();
            $item->tag = ['featured'];
            $item->Seo = [ 
                'metaTitle'=> $item->name,
                'metaDescription'=> $item->description,
                'shareImage' => $item->banner
            ];
        }
 
        return $properties; 
    }

    public function store(Request $request) {

        $newItem = new ListItem;
        $newItem->name = $request->listItem;
        $newItem->is_complete = 0;
        $newItem->save();

        return redirect('/dashboard');
    }

    public function edit($id) {
        $newItem = ListItem::find($id);
        $newItem->is_complete = 1;
        $newItem->save();
        
        return redirect('/dashboard');
    }
}
