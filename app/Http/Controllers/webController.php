<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Page;
use Illuminate\Support\Facades\DB;


class webController extends Controller
{
    //
    public function home(){

        // var_dump($kamar[0]->foto);
        $promos = Promo::where('status', '1')->get();
        $albums = DB::table('albums')->get();
        $galeries = DB::table('galeri')->get();
        $slides = DB::table('slide')->get();
        return view('pages.home', compact('promos', 'albums', 'galeries', 'slides'));
    }

    public function blog(){

        // var_dump($kamar[0]->foto);
        $promos = Promo::where('status', '1')->get();
        $albums = DB::table('albums')->get();
        $blogs = DB::table('blogs')->get();
        $slides = DB::table('slide')->get();
        return view('pages.blog', compact('promos', 'albums', 'blogs', 'slides'));
    }
    public function blogDetail($slug){
        // $slug = $request->query('slug');
        // var_dump($kamar[0]->foto);
        $promos = Promo::where('status', '1')->get();
        $albums = DB::table('albums')->get();
        $galeries = DB::table('galeri')->get();
        $blogDetail = DB::table('blogs')->where('slug', $slug)->get();
        return view('pages.blog-detail', compact('promos', 'albums', 'galeries', 'blogDetail'));
    }
    
    public function oneBedroom(){

        // var_dump($kamar[0]->foto);
        $galeries = DB::table('galeri')->where('id_album', '1')->get();
        $pages = Page::where('slug', 'one-bed-room')->first();
        return view('pages.one-bedroom', compact('galeries', 'pages'));
    }
    public function twoBedroom(){

        // var_dump($kamar[0]->foto);
        $galeries = DB::table('galeri')->where('id_album', '2')->get();
        $pages = Page::where('slug', 'two-bed-room')->first();
        return view('pages.two-bedroom', compact('galeries', 'pages'));
    }
    public function dining(){

        // var_dump($kamar[0]->foto);

        return view('pages.dinning');
    }
    public function gallery(){

        // var_dump($kamar[0]->foto);
        $albums = DB::table('albums')->get();
        $galeries = DB::table('galeri')->get();
        $pages = Page::where('slug', 'gallery')->first();
        return view('pages.gallery', compact('albums', 'galeries', 'pages'));
    }

    public function services(){

        // var_dump($kamar[0]->foto);
        $galeries = DB::table('galeri')->get();
        $pages = Page::where('slug', 'provide-services')->first();
        return view('pages.services', compact('pages', 'galeries'));
    }
    public function specialOffers(){

        // var_dump($kamar[0]->foto);
        $pages = Page::where('slug', 'special-offers')->first();
        return view('pages.special-offers', compact('pages'));
    }
    public function aboutUs(){

        // var_dump($kamar[0]->foto);
        $pages = Page::where('slug', 'about-us')->first();
        return view('pages.about-us', compact('pages'));
    }

    

}
