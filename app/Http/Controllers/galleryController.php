<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;


class galleryController extends Controller
{
    //
    //=========admin
    public function adminGallery(){

        $gallery = Gallery::all();
        $albums = DB::table('albums')->get();
        return view('admin.admin-gallery', compact('gallery', 'albums'));
    }   
    public function createGallery(){
        $albums = DB::table('album')->get();
        return view('admin.admin-gallery-edit', compact('albums'));
    }
    public function getGalleryByAlbumId($albumId){
        $gallery = Gallery::where('id_album', $albumId)->get();
        return response()->json(['success' => true, 'gallery' => $gallery]);
    }
    public function dataDasboard(){

        // var_dump($kamar[0]->foto);
        $slide = DB::table('slide')->get();
        return response()->json(['success' => true, 'slide' => $slide]);
    }
}
