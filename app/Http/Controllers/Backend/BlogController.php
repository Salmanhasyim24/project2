<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with(['category'])->get();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = BlogCategory::all();
        return view('backend.blog.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
         $data = array();
            $data['blog_category_id'] = $request->blog_category_id;
            $data['title'] = $request->title;
            $data['tags'] = $request->tags;
            $data['description'] = $request->description;
            $data['created_at'] = Carbon::now();


  	 $image = $request->image;
  	 	if ($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(430,327)->save('upload/blog/'.$image_one);
  	 		$data['image'] = 'upload/blog/'.$image_one;
            Blog::insert($data);

  	 		$notification = array(
    	 	'message' => 'Post Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return to_route('blog')->with($notification);
  	 	
  	 	}else{
  	 		return Redirect()->back();
  	 	} // End Condition


  }  // END Method 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::findOrFail($id);

        return view('backend.blog.edit', [
            'categories' => $categories, 
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {

         $blog_id = $request->id;

             Blog::findOrFail($blog_id)->update([

            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);


         $notification = array(
            'message' => 'Blog Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return to_route('blog')->with($notification); 

    }// End Method 

         public function updateimage(Request $request){

        $blog_id = $request->id;

        $blog = Blog::findOrFail($blog_id);
        $oldImage = $blog->image;

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        Blog::findOrFail($blog_id)->update([

            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Image Post Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 
   

    public function destroy($id)
    {
        //
    }
}
