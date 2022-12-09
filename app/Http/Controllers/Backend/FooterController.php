<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allfooter = Footer::find(1);
        return view('backend.footer.index', compact('allfooter'));
    }

  
    public function update(Request $request)
    {
        $footer_id = $request->id;

         Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'short_description' => $request->short_description,
                'adress' => $request->adress,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,

            ]); 
            $notification = array(
            'message' => 'Footer Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method 

    public function destroy($id)
    {

        Footer::findOrFail($id)->delete();
          $notification = array(
            'message' => 'Footer Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
