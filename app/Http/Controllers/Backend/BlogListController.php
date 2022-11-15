<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogListController extends Controller
{
    public function blogList()
    {
        $blog = Blog::paginate(2);
        return view('backend.content.BlogList.blogList', compact('blog'));
    }
    public function statusUpdate($id, $status)
    {
        $blog = Blog::find($id);
        $blog->update(['status' => $status]);
        return redirect()->back();
    }
}
