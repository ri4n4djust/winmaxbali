<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class serviceController extends Controller
{
    //
    public function index()
    {
        $blogs = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admin-service', compact('blogs'));
    }
    
    public function edit($id)
    {
        $page = Service::find($id);
        if (!$page) {
            $page = new Service();
            $page->id = 0; // Indicate that this is a new entry
        }
        // $blogtypes = Blogtype::all();
        return view('admin.admin-service-edit', compact('page'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        $page = Service::find($id);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->image = $request->image;
        $page->save();
        return redirect()->route('admin.service')->with('success', 'Service updated successfully');
    }
    public function destroy($id)
    {
        $page = Service::find($id);
        $page->delete();

        // Delete all files in the public disk whose filename starts with the id
        $disk = \Illuminate\Support\Facades\Storage::disk('service');
        foreach ($disk->allFiles() as $file) {
            if (strpos(basename($file), (string)$id) === 0) {
                $disk->delete($file);
            }
        }
        return redirect()->route('admin.service')->with('success', 'Service deleted successfully');
    }
}
