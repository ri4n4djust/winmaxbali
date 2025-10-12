<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogtype;

class blogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admin-blog', compact('blogs'));
    }
    public function create()
    {
        return view('admin.admin-blogs-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'slug' => 'required',
            // 'content' => 'required',
            // 'image' => 'required',
        ]);
        $page = new Blog();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->image = $request->image;
        $page->save();
        return redirect()->route('admin.blog')->with('success', 'Blog created successfully');
    }
    public function edit($id)
    {
        $page = Blog::find($id);
        $blogtypes = Blogtype::all();
        return view('admin.admin-blog-edit', compact('page', 'blogtypes'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        $page = Blog::find($id);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->image = $request->image;
        $page->save();
        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully');
    }
    public function destroy($id)
    {
        $page = Blog::find($id);
        $page->delete();

        // Delete all files in the public disk whose filename starts with the id
        $disk = \Illuminate\Support\Facades\Storage::disk('blog');
        foreach ($disk->allFiles() as $file) {
            if (strpos(basename($file), (string)$id) === 0) {
                $disk->delete($file);
            }
        }
        return redirect()->route('admin.blog')->with('success', 'Page deleted successfully');
    }
}
