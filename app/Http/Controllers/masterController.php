<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

    public function callback(Request $request)
    {
        // $data = file_get_contents('php://input');
        // $my_file = 'file.txt';
        // $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        // fwrite($handle, $data);
        // fclose($handle);
        // return view('callback', ['hasil' => $data]);
        // return response([$data], 200);
        // $data =  $request->input('status');
        //POST /api.example.com/foo?callbackURL=http://my.server.com/bar
        // $body = json_decode($request->getContent(), true);
        // return json_decode($request->getContent(), true);
        $response = Http::post('https://developer.iak.id/api/sandbox/prepaid/success?callbackURL=https://winmaxbali.id/api/callback');
        // $json = json_decode(file_get_contents('https://developer.iak.id/api/sandbox/prepaid/success'), true);
        // echo $json;
        // return response([$data], 200);
        // dd($request->all());
        // $body = $response->getContent();
        // $body =json_decode($response); 
        // $key_value = $body->data; //access key  
        // $collection = collect( $key_value);
        // $filtered = $collection->where('product_description', $cariop)->where('product_type', 'pulsa');
        return $body;
    }
}
