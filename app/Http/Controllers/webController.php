<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Page;
use App\Models\Service;
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

    public function blog($slug){

        // var_dump($kamar[0]->foto);
        $promos = Promo::where('status', '1')->get();
        $albums = DB::table('albums')->get();
        if($slug == 'all'){
            $blogs = DB::table('blogs')->orderBy('id', 'desc')->get();
        } else {
            $blogtype = DB::table('blogtypes')->where('slug', $slug)->first();
            if($blogtype){
                $blogs = DB::table('blogs')->where('type', $blogtype->id)->orderBy('id', 'desc')->get();
            } else {
                $blogs = [];
            }
        }
        // $blogs = DB::table('blogs')->orderBy('id', 'desc')->get();

        $blogtypes = DB::table('blogtypes')->get();
        return view('pages.blog', compact('promos', 'albums', 'blogs', 'blogtypes'));
    }
    public function blogDetail($slug){
        // $slug = $request->query('slug');
        // var_dump($kamar[0]->foto);

        $categories = DB::table('blogtypes')->get();
        $albums = DB::table('albums')->get();
        $popularPosts = DB::table('blogs')->get();
        $blogDetail = DB::table('blogs')->where('slug', $slug)->get();
        return view('pages.blog-detail', compact('categories', 'albums', 'popularPosts', 'blogDetail'));
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
        $services = Service::all(); ;
        return view('pages.services', compact('pages', 'services', 'galeries'));
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
