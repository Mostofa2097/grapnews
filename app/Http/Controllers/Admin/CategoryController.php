<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        //__query_builder__
       // $category = DB::table('categories')->get();
     
        //__ele__
        $category= Category::all();
        return view('admin.category.index',compact('category'));
     }

    public function create(){
        return  view('admin.category.create');
        
     }

    public function store(Request $request)  {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ]);

        // $category = new Category;
        // $category->category_name =  $request->category_name;
        // $category->category_slug = Str::of($request->category_name)->slug('-');
        // $category->save();

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        return redirect()->back();
     }

     public function edit($id)  {
        //$data = DB::table('categories')->where('id',$id)->first();
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
     }


     function update(Request $request, $id){
        $category = Category::find($id);
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        return redirect()->route('category.index');
        
     }

     function destroy($id) {
        //DB::table('categories')->where('id',$id)->delete();

        // $category = Category::find($id);
        // $category->delete();
        Category::destroy($id);
        return redirect()->back();
     }







}
