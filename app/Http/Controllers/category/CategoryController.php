<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\service;
use App\Models\sub_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function cat_list()
    {
        $categories = category::all();

        return view('backend.layout.category.list', compact('categories'));
    }
    public function cat_add(Request $request)
    {
        category::create([
            "name" => $request->name,
            "description" => $request->description,

        ]);
        return back();
    }
    public function cat_edit($id)
    {
        $category = category::find($id);
        return view('backend.layout.category.edit', compact('category'));
    }
    public function cat_update(Request $request, $id)
    {
        $category = category::find($id);
        $category->update(
            [
                "name" => $request->name,
                "description" => $request->description,
            ]
        );
        return redirect()->route('cat_list')->with('sucess', 'updated');
    }
    public function cat_delete($id)
    {
        $category = category::find($id)->first();
        $sub_categories = sub_category::where('cat_id', $category->id)->get();

        if ($sub_categories->isEmpty()) {
            $category->delete();
        } else {
            foreach ($sub_categories as $sub_category) {
                // $service = sub_category::where('cat_id', $category->id)->delete();
                $sub_category->delete();
                $category->delete();
            }
        }
        return redirect()->route('cat_list')->with('error', ' Deleted');
    }





    // SUB_CATEGORY

    public function sub_cat_list()
    {
        $categories = category::all();
        $sub_categories = sub_category::all();

        return view('backend.layout.subcategory.sublist', compact('categories', 'sub_categories'));
    }
    public function sub_cat_add(Request $request)
    {
        sub_category::create([
            "name" => $request->name,
            "cat_id" => $request->cat_id,
            "description" => $request->description,

        ]);
        return back();
    }
    public function sub_cat_edit($id)
    {
        $sub_category = sub_category::find($id);
        return view('backend.layout.subcategory.sub_list_edit', compact('sub_category'));
    }
    public function sub_cat_update(Request $request, $id)
    {
        $sub_category = sub_category::find($id);
        $sub_category->update(
            [
                "name" => $request->name,
                "description" => $request->description,
            ]
        );
        return redirect()->route('sub_cat_list')->with('sucess', 'updated');
    }
    public function sub_cat_delete($id)
    {
      
        $sub_category = sub_category::findOrFail($id);
        $services = sub_category::where('id', $sub_category->id)->get();

       
            foreach ($services as $service) {
                
                $service->delete();
            }
        
        return redirect()->route('sub_cat_list')->with('error', ' Deleted');
    }

}
