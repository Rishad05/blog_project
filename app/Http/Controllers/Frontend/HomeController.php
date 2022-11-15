<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage(Request $request)
    {
        if ($request->search) {
            $blogs = Blog::where('blog_title' . 'like' .  '%' . $request->search . '%')->latest()->get();
        } else {
            $blogs = Blog::where('status', '=', 'Published')->get();
        }

        return view('frontend.layouts.homePage', compact('blogs'));
    }
    // public function viewAllBlogs(){
    //     $blogs=Blog::All();

    // }
}
