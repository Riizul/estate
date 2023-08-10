<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $types = PropertyType::leftJoin('property_categories', function($join) {
            $join->on('property_types.categoryId', '=', 'property_categories.id');
          })
          ->get([
              'property_types.id',
              'property_types.categoryId',
              'property_types.name',
              'property_categories.name AS categoryName',
          ]);

        $data=array(
            'types' => $types,
            'propertyCategories' => PropertyCategory::all()
        );

        return view('type.index')->with($data);
    }

    public function store(Request $request)
    {
        // dd($request);
        if($request->action == "add") {
            $obj = new PropertyType;
            $obj->categoryId = $request->category;
            $obj->name = $request->name;
        }
        else {
            $obj = PropertyType::find($request->id);
            $obj->categoryId = $request->category;
            $obj->name = $request->name;
        }

        $obj->save();

        return redirect()
            ->route('type.index')
            ->withSuccess(__('Saved successfully.')); 
    }

    public function destroy($id) 
    {
        $obj = PropertyType::find($id); 
        $obj->delete();

        return redirect()
            ->route('type.index');
    }
}
