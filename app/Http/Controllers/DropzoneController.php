<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DropzoneController extends Controller
{
    //
    public function index(): View
    {
        $images = Gallery::all();
        return view('dropzone', compact('images'));
    }
      
    /**
     * Image Upload Code
     *
     * @return void
     */
    public function store(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('file')) {
            
            // Generate unique file name with timestamp
            $fileName1 = $request->file->getClientOriginalName();
            $idal = $request->id_album;
            $fileName = $idal . '_' . $fileName1;

            // Store the file in the 'public/uploads' directory
            $request->file->storeAs('/images/', $fileName, 'public');
            
            // Save the file name to the database
            $gallery = Gallery::updateOrCreate(
                ['nama_foto' => $fileName],
                [
                    'id_album' => $request->id_album,
                    'path' => 'storage/images/' . $fileName,
                ]
            );

            return response()->json(['success' => true, 'file_name' => $fileName]);
        }

        return response()->json(['success' => false, 'message' => 'File upload failed']);
    }

    public function storeBg(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('file')) {
            
            // Generate unique file name with timestamp
            $fileName1 = $request->file->getClientOriginalName();
            $idal = $request->idal;
            $fileName = $idal . '_' . $fileName1;

            // Store the file in the 'public/uploads' directory
            $request->file->storeAs('/banner/', $fileName, 'public');
            
            // Save the file name to the database
            $page = Page::updateOrCreate(
                ['id' => $idal],
                [
                    'image' => $fileName,
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                ]
            );
            

            return response()->json(['success' => true, 'file_name' => $fileName]);
        }

        return response()->json(['success' => false, 'message' => 'File upload failed']);
    }

    public function storeBlog(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $old = Blog::where('id', $request->idal)->first();
            // if an existing blog row exists and its image is not '-', append the new filename to it,
            // otherwise set image to the new filename. Perform store + DB update here and return.
            $fileName1 = $request->file->getClientOriginalName();
            $idal = $request->idal;
            $fileName = $idal . '_' . $fileName1;

            // Store the uploaded file
            $request->file->storeAs('/blog/', $fileName, 'public');

            // Prepare final image value
            $finalImage = ($old && !empty($old->image) && $old->image !== '-') ? $old->image . ',' . $fileName : $fileName;

            // Update/create the blog record with the combined image value
            Blog::updateOrCreate(
                ['id' => $idal],
                [
                    'id' => $idal,
                    'image' => $finalImage,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'content' => $request->content,
                    'type' => $request->type,
                    'meta_title' => $request->title,
                    'meta_description' => $request->meta_description,
                    'meta_keywords' => $request->meta_keywords,
                ]
            );

            // Return JSON response and stop further processing
            return response()->json(['success' => true, 'file_name' => $fileName]);
            
        }

        return response()->json(['success' => false, 'message' => 'File upload failed']);
    }

    public function storeService(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $old = Service::where('id', $request->idal)->first();
            // if an existing blog row exists and its image is not '-', append the new filename to it,
            // otherwise set image to the new filename. Perform store + DB update here and return.
            $fileName1 = $request->file->getClientOriginalName();
            $idal = $request->idal;
            $fileName = $idal . '_' . $fileName1;

            // Store the uploaded file
            $request->file->storeAs('/service/', $fileName, 'public');

            // Prepare final image value
            $finalImage = ($old && !empty($old->image) && $old->image !== '-') ? $old->image . ',' . $fileName : $fileName;

            // Update/create the blog record with the combined image value
            Service::updateOrCreate(
                ['id' => $idal],
                [
                    'image' => $finalImage,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'content' => $request->content,
                    'meta_title' => $request->title,
                    'meta_description' => $request->meta_description,
                    'meta_keywords' => $request->meta_keywords,
                ]
            );

            // Return JSON response and stop further processing
            return response()->json(['success' => true, 'file_name' => $fileName]);
            
        }

        return response()->json(['success' => false, 'message' => 'File upload failed']);
    }

    public function storeSl(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('file')) {
            
            // Generate unique file name with timestamp
            $fileName = $request->file->getClientOriginalName();
            // $idal = $request->idal;
            // $fileName = $idal . '_' . $fileName1;

            // Store the file in the 'public/uploads' directory
            $request->file->storeAs('/slide/', $fileName, 'public');
            
            // Save the file name to the database
            $page = DB::table('slide')->insert(
                [
                    'image' => $fileName,
                    'slug' => Str::slug($fileName),
                    'path' => '/storage/slide/' . $fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            

            return response()->json(['success' => true, 'file_name' => $fileName]);
        }

        return response()->json(['success' => false, 'message' => 'File upload failed']);
    }


    /**
     * Remove Image
     *
     * @return void
     */
    public function destroy(Request $request){
        $fileName = $request->file_name;
        $image = Gallery::where('nama_foto', $fileName)->first();

        if ($image) {
            $image->delete();
            $image_path = $image->path;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            return response()->json(['success' => true, 'message' => 'File deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }

    public function destroyBg(Request $request){
        $fileName = $request->file_name;
        $image = Page::where('image', $fileName)->first();

        if ($fileName) {
            // $image->delete();
            // $image_path = $image->image;
            $image->update(['image' => '-']);
            $image_path = "/storage/banner/". $fileName;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            return response()->json(['success' => true, 'message' => 'File deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }
    public function destroyBlog(Request $request){

        $fileName = $request->file_name;

        $image = Blog::where('image', $fileName)->first();

        if ($fileName) {
            // $image->delete();
            // $image_path = $image->image;
            // find a blog row that contains the filename (handles comma-separated lists)
            // fall back to the exact-match that was queried earlier if present
            $real = Blog::where('image', 'like', '%' . $fileName . '%')->first() ?? $image;

            if ($real) {
                $parts = array_filter(array_map('trim', explode(',', (string)$real->image)));
                // remove all occurrences of the filename
                $remaining = array_values(array_filter($parts, function ($p) use ($fileName) {
                    return $p !== $fileName;
                }));

                $newImageValue = count($remaining) ? implode(',', $remaining) : '-';
                $real->update(['image' => $newImageValue]);
            }

            // replace $image with a no-op updater to avoid the following unconditional update call
            $image = new class {
                public function update($data) { return true; }
            };
            $fullPath = "../storage/app/public/blog/". $fileName;
            // $fullPath = public_path('storage/blog/' . $fileName);
            if (file_exists($fullPath)) {
                unlink($fullPath);
                // Storage::disk('public')->delete('blog/' . $fileName);
                // $deleted=Storage::disk('public')->delete('image');

            }
            return response()->json(['success' => true, 'message' => 'File deleted very successfully']);
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }

    public function destroyService(Request $request){

        $fileName = $request->file_name;

        $image = Service::where('image', $fileName)->first();

        if ($fileName) {
            // $image->delete();
            // $image_path = $image->image;
            // find a blog row that contains the filename (handles comma-separated lists)
            // fall back to the exact-match that was queried earlier if present
            $real = Service::where('image', 'like', '%' . $fileName . '%')->first() ?? $image;

            if ($real) {
                $parts = array_filter(array_map('trim', explode(',', (string)$real->image)));
                // remove all occurrences of the filename
                $remaining = array_values(array_filter($parts, function ($p) use ($fileName) {
                    return $p !== $fileName;
                }));

                $newImageValue = count($remaining) ? implode(',', $remaining) : '-';
                $real->update(['image' => $newImageValue]);
            }

            // replace $image with a no-op updater to avoid the following unconditional update call
            $image = new class {
                public function update($data) { return true; }
            };
            // $image_path = "/storage/blog/". $fileName;
            $fullPath = public_path('storage/service/' . $fileName);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            return response()->json(['success' => true, 'message' => 'File deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }

    public function destroySl(Request $request){
        $fileName = $request->file_name;
        

        if ($fileName) {
            $image = DB::table('slide')->where('image', $fileName)->delete();
            // $image->delete();
            // $image_path = $image->image;
            // $image->update(['image' => '-']);
            $image_path = "/storage/slide/". $fileName;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            return response()->json(['success' => true, 'message' => 'File deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }

}
