<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class pageController extends Controller
{
    //
    public function index()
    {
        $pages = Page::all();
        return view('admin.admin-page', compact('pages'));
    }
    public function create()
    {
        return view('admin.admin-page-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->image = $request->image;
        $page->save();
        return redirect()->route('admin.page')->with('success', 'Page created successfully');
    }
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.admin-page-edit', compact('page'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        $page = Page::find($id);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->image = $request->image;
        $page->save();
        return redirect()->route('admin.page')->with('success', 'Page updated successfully');
    }
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('admin.page')->with('success', 'Page deleted successfully');
    }
}
