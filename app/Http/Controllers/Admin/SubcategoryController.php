<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    function index()
    {
        //    $data =  DB::table('subcategories')->leftJoin('categories','subcategories.category_id','categories.id')->
        //    select('categories.category_name','subcategories.*') ->get();
        $data = Subcategory::all();
        return view('admin.subcategory.index',compact('data'));
    }


    function create()
    {

        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        //  $validated = $request->validate([
        //      'category_id' => 'required',
        //      'subcategory_name' => 'required|unique:categories|max:255',

        //  ]);

        $subcategory = new Subcategory;
        $subcategory->category_id =  $request->category_id;
        $subcategory->subcategory_name =  $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);
        return redirect()->back();
    }


    function destroy($id) {
        //DB::table('categories')->where('id',$id)->delete();

        // $category = Category::find($id);
        // $category->delete();
        Subcategory::destroy($id);
        return redirect()->back();
     }


     function edit($id){
        $categories = Category::all();
        $data = Subcategory::find($id);
        return view('admin.subcategory.edit',compact('categories','data'));
     }


     function update(Request $request, $id){
        // $category = Category::find($id);
        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);

        $subcategory = Subcategory::find($id);

        $subcategory->category_id =  $request->category_id;
        $subcategory->subcategory_name =  $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        return redirect()->route('subcategory.index');
        
     }

}
