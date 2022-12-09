<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImg;
use Image;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('backend.about.index',[
            'abouts' => $abouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(523,605)->save('upload/about/thumbnail/'.$name_gen);
        $save_url = 'upload/about/thumbnail/'.$name_gen;

        $about_id = About::insertGetId([

            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description, 

            'thumbnail' => $save_url,
            'created_at' => Carbon::now(), 
        ]);

        /// Multiple Image Upload From her //////
        
        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(220,220)->save('upload/about/multi-image/'.$make_name);
        $uploadPath = 'upload/about/multi-image/'.$make_name;

 
        MultiImg::insert([
            'about_id' => $about_id,
            'multi_img' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]); 
        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'About Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('about')->with($notification); 


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
    
        $abouts = About::findOrFail($id);
        $multiImgs = MultiImg::where('about_id',$id)->get();

        return view('backend.about.edit',[
            'abouts' => $abouts,
            'multiImgs' => $multiImgs,
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
                $about_id = $request->id;

             About::findOrFail($about_id)->update([

         
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description, 

            'created_at' => Carbon::now(), 

        ]);


         $notification = array(
            'message' => 'About Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return to_route('about')->with($notification); 

    }// End Method 

     public function UpdateaboutThumbnail(Request $request){

        $about_id = $request->id;
        $about = About::findOrFail($about_id);
        
        $oldImage = $about->thumbnail;

        $image = $request->file('thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(523,605)->save('upload/about/thumbnail/'.$name_gen);
        $save_url = 'upload/about/thumbnail/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        About::findOrFail($about_id)->update([

            'thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'About Image Thumbnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 


    // Multi Image Update 
    public function UpdateaboutMultiimage(Request $request)
    {
   
    $imgs = $request->multi_img;
    if (is_iterable($imgs)) {
    foreach ($imgs as $id => $img) {
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->multi_img);

        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(220, 220)->save('upload/about/multi-image/'.$make_name);
        $uploadPath = 'upload/about/multi-image/'.$make_name;

        MultiImg::where('id', $id)->update([
            'multi_img' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);
    } // end foreach
}

         $notification = array(
            'message' => 'About Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 



    public function MulitImageDelelte($id){
        $oldImg = MultiImg::findOrFail($id);
        
        unlink($oldImg->multi_img);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'About Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 
 

     public function aboutDelete($id)
    {
        
    $about = About::findOrFail($id);
    unlink($about->thumbnail);
    About::findOrFail($id)->delete();

    $imges = MultiImg::where('about_id', $id)->get();
    foreach ($imges as $img) {
        unlink($img->multi_img);
        MultiImg::where('about_id', $id)->delete();
    }

    $notification = array(
        'message' => 'About Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }


}
