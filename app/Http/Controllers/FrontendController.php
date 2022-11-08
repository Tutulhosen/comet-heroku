<?php

namespace App\Http\Controllers;

use App\Models\Categorypost;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Tagpost;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * show home page
     */
    public function index()
    {
        $slider_data= Slider:: where('status', true)->latest()->get();
        return view('frontend.pages.home', compact('slider_data'));
    }

    /**
     * show contact page
     */

     public function contactPageShow()
     {
       return view('frontend.pages.contact.index');
     }


     /**
      * show single portfolio page
      */

      public function portfolioSinglePage($slug)
      {
        $single_data= Portfolio::where('slug', $slug)->first();
        return view('frontend.pages.single_page.index', compact('single_data'));
      }

      /**
       * show blog page
       */
      public function blogpageshow()
      {
        $post_data= Post::where('status', true)->latest()->get();
        
        return view('frontend.pages.blog.index', compact('post_data'));
      }

      /**
       * show blog single page
       */
      public function blogsinglepageshow($slug)
      {
        $single_blog= Post::where('slug', $slug)->first();
        return view('frontend.pages.blog.section.single-page', compact('single_blog'));
        
       
      }


      /**
       * show blog post by category
       */
      public function blogpostbycategory($slug)
      {
       $category_post =Categorypost::where('slug', $slug)->first();
       $post_data= $category_post->post;
        
        
        return view('frontend.pages.blog.index', compact('post_data'));
      }
      

       /**
       * show blog post by tag
       */
      public function blogpostbytag($slug)
      {
       $tag_post =Tagpost::where('slug', $slug)->firstOrFail();
       $post_data= $tag_post->post;
        
        
        return view('frontend.pages.blog.index', compact('post_data'));
      }




}
