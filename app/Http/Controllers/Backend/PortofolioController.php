<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
   
    public function index()
    {
        $portofolios = Portofolio::latest()->get();
        return view('backend.portofolio.index', compact('portofolios'));
    }

  
    public function create()
    {
        return view('backend.portofolio.create');
    }

   
    public function store(Request $request)
    {
         $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,519)->save('upload/portofolio/'.$name_gen);
        $save_url = 'upload/portofolio/'.$name_gen;

        Portofolio::insert([
            'name'=> $request->name,
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $save_url,
        ]);
              $notification = array(
            'message' => 'Portofolio Inserted Successfully',
            'alert-type' => 'success'
        );
        return to_route('portofolio')->with($notification);
    }   

 
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('backend.portofolio.edit', compact('portofolio'));
    }

    
   public function update(Request $request)
    {
         $portofolio_id = $request->id;

          Portofolio::findOrFail($portofolio_id)->update([

            'title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,

            'created_at' => Carbon::now(), 

        ]);


         $notification = array(
            'message' => 'Potofolio Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return to_route('portofolio')->with($notification); 

    }// End Method 

     public function UpdatePortofolioThumbnail(Request $request){

        $portofolio_id = $request->id;
        $portofolio = Portofolio::findOrFail($portofolio_id);
        
        $oldImage = $portofolio->image;

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,519)->save('upload/portofolio/'.$name_gen);
        $save_url = 'upload/portofolio/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        Portofolio::findOrFail($portofolio_id)->update([

            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Portofolio Image Thumbnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 


    
    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);
    unlink($portofolio->image);
    Portofolio::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Portofolio Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }
}
