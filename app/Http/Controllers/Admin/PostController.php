<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Provider\Image;

class PostController extends Controller
{
    function create()
    {
        $category = Category::all();

       return view('admin.post.create',compact('category'));
    }

    function index(){
        //$posts = Post::all();

        $posts = DB::table('posts')
        ->leftJoin('categories','posts.category_id','categories.id')
        ->leftJoin('subcategories','posts.subcategory_id','subcategories.id')
        ->leftJoin('users','posts.user_id','users.id')
        ->select('posts.*','categories.category_name','subcategories.subcategory_name','users.name')
        ->get();

        return view('admin.post.index',compact('posts'));
    }


    public function store(Request $request)
    {
       
        $categoryid = DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->title)->slug('-');
        $data = array();
        $data['category_id']= $categoryid;
        $data['subcategory_id']= $request->subcategory_id;
        $data['title']= $request->title;
        $data['slug']= $slug;
        $data['post_date']= $request->post_date;
        $data['tags']= $request->tags;
        $data['description']= $request->description;
        $data['user_id']= Auth::id();
        $data['status']= $request->status;
        $photo = $request->image;
        if($photo){
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->save('public/media/'.$photoname);
            $data['image']= 'public/media/'.$photoname;
            DB::table('posts')->insert($data);
            return redirect()->back();
        }
        DB::table('posts')->insert($data);
        return redirect()->back();
 
        
    }
    
}
