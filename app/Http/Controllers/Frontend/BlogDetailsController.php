<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogDetailsController extends Controller
{
    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        // $comments = Comment::where('blog_id',$blog->id)->get();
        // dd($blog);
        return view('frontend.layouts.blogDetails', compact('blog'));
    }

    public function comments(Request $request)
    {
        // dd($request->all());
        Comment::create([
            "user_comment" => $request->user_comment,
            "user_id" => Auth::user()->id,
            "blog_id" => $request->blog_id,
            "parent_id" => $request->comment_id
        ]);
        return redirect()->back();
    }
}
