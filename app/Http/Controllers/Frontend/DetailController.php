<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Footer;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DetailController extends Controller
{

    public function Home()
    {

        $allfooter = Footer::find(1);

        return view('frontend.index', [
    
            'allfooter' => $allfooter,
        ]);
    }

     public function PortfolioDetails($id){

        $portfolio = Portofolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
     } // End Method 


     public function HomePortfolio(){

      $portfolio = Portofolio::latest()->get();
      return view('frontend.portfolio',compact('portfolio'));
     } // End Method 

 
     public function BlogDetails($id){

        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('title','ASC')->get();
        $allfooter = Footer::find(1);
        return view('frontend.blog_details',compact('blogs','allblogs','categories', 'allfooter'));

    } // End Method 


     public function CategoryBlog($id){

        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('title','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        $allfooter = Footer::find(1);
        return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','categoryname', 'allfooter'));

     } // End Method 

     public function HomeBlog(){

        $categories = BlogCategory::orderBy('title','ASC')->get();
        $allblogs = Blog::latest()->paginate(3);
        return view('frontend.blog',compact('allblogs','categories'));

     } // End Method 


     public function HomeAbout(){

        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));

     }// End Method 

}
