<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Throwable;

class BlogController extends Controller
{
    public function blog()
    {
        $blog = Blog::where('user_id', auth()->user()->id)->paginate(2);
        return view('backend.content.Blog.list', compact('blog'));
    }
    public function blogCreate()
    {
        return view('backend.content.Blog.createBlog');
    }
    public function create(Request $request)
    {
        $file_name = '';
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            if ($file->isValid()) {
                $file_name = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->move('blogs/', $file_name);
            }
        }
        $title = $request->input('blog_title');
        // $postId = Blog::latest()->take(1)->first()->id + 1;
        $slug = Str::slug($title, '-'); //. '-' . $postId;
        $user_id = Auth::user()->id;
        $description = $request->input('blog_description');
        $image = $file_name;
        // dd($image);

        $blog = new Blog();
        $blog->blog_title = $title;
        $blog->slug = $slug;
        $blog->user_id = $user_id;
        $blog->blog_description = $description;
        $blog->image = $image;

        $blog->save();

        return redirect()->route('blog')->with('success', 'Blog created successfully');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);

        try {
            $blog->delete();
            return redirect()->route('blog')->with('error-message', 'Blog deleted successfully');
        } catch (Throwable $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error-message', 'Under this table have a relation with other table');
            }
        }
    }


    public function editBlog($id)
    {

        $blog = Blog::find($id);
        return view('backend.content.Blog.edit', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::find($id);
        if ($request->hasFile('blog_image')) {

            $image_path = public_path() . '/blogs/' . $blog->image;

            if ($blog->image) {
                unlink($image_path);
            }
            $file_name = '';
            $file = $request->file('blog_image');
            if ($file->isValid()) {
                $file_name = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->move('blogs', $file_name);
            }

            $blog->update([
                'image' => $file_name
            ]);
        }
        $blog->update([
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
        ]);
        return redirect()->route('blog')->with('success', 'Blog updated successfully');
    }
}
