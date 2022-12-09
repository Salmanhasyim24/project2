<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Faker\Core\Blood;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogCategory::latest()->get();
        return view('backend.blogcategory.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BlogCategory::insert([
                'title' => $request->title,               

            ]); 

            $notification = array(
            'message' => 'Blog Category Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('blog')->with($notification);


    } // End Method


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
        $blog = BlogCategory::findOrFail($id);

        return view('backend.blogcategory.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog_id = $request->id;

             BlogCategory::findOrFail($blog_id)->update([
            'title' => $request->title,
            'created_at' => Carbon::now(), 

        ]);


         $notification = array(
            'message' => 'BLogCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return to_route('blog')->with($notification); 

    }// End Method 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'BLogCategory Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
}
