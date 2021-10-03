<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class masterController extends Controller
{
    //
    public function index()
    {
        // mengambil data dari table pegawai
      $galeri = DB::table('galeris')->get();
      $album = DB::table('albums')->get();
      //$user = DB::table('users')->get();
      //$sliders = DB::table('sliders')->get();
      // mengirim data pegawai ke view index
      return view('welcome',['galeri' => $galeri, 'album' => $album]);
    }
    public function indexGaleri()
    {
        $posts = DB::table('galeris')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Galeri',
            'data' => $posts
        ], 200);
    }
    public function indexAlbum()
    {
        $posts = DB::table('albums')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Album',
            'data' => $posts
        ], 200);
    }
}
