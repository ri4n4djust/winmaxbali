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

    public function blog(Request $request, $slug){

        // var_dump($kamar[0]->foto);
        $promos = Promo::where('status', '1')->get();
        $albums = DB::table('albums')->get();
        $search = $request->query('query');
        if($slug == 'all'){
            $blogs = DB::table('blogs')->orderBy('id', 'desc')->get();
        }elseif($search != null){
            $search = $request->query('query');
            $blogs = DB::table('blogs')->where('slug', 'like', '%' . $search . '%')->get();
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
        // Get the current view count
        $currentViews = DB::table('blogs')->where('slug', $slug)->value('views');
        // Increment the view count
        DB::table('blogs')->where('slug', $slug)->update(['views' => ($currentViews + 1)]);
        $popularPosts = DB::table('blogs')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        $categories = DB::table('blogtypes')->get();
        $albums = DB::table('albums')->get();
        $popularPosts = DB::table('blogs')->get();
        $blogDetail = DB::table('blogs')->where('slug', $slug)->get();
        return view('pages.blog-detail', compact('categories', 'albums', 'popularPosts', 'blogDetail'));
    }
        
    public function products(Request $request, $slug){

        // var_dump($kamar[0]->foto);
        $promos = Promo::where('status', '1')->get();
        $albums = DB::table('albums')->get();
        $search = $request->query('q');
        $category = $request->query('category');
        if($search == ''){
            $cr = 'all';
        }

        if ($search != null && $search != 'all') {
            $products = DB::table('products')->where('name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(12);
        } elseif ($category != null) {
            // if category is numeric assume it's an ID, otherwise treat as slug
            if (is_numeric($category)) {
                $products = DB::table('products')->where('category_id', $category)->orderBy('id', 'desc')->paginate(12);
            } else {
                $cat = DB::table('product_categories')->where('code_cat', $category)->first();
                if ($cat) {
                    $products = DB::table('products')->where('category_id', $cat->code_cat)->orderBy('id', 'desc')->paginate(12);
                } else {
                    // fallback to all products if category query is invalid
                    $products = DB::table('products')->orderBy('id', 'desc')->paginate(12);
                }
            }
        } elseif ($slug == 'all') {
            $products = DB::table('products')->orderBy('id', 'desc')->paginate(12);
        } elseif ($cr == 'all') {
            $products = DB::table('products')->orderBy('id', 'desc')->paginate(12);
        } else {
            $categories = DB::table('product_categories')->where('code_cat', $category)->first();
            if($categories){
                $products = DB::table('products')->where('category_id', $categories->code_cat)->orderBy('id', 'desc')->paginate(12);
            } else {
                $products = [];
            }
        }

        $categories = DB::table('product_categories')->get();
        return view('pages.products', compact('promos', 'albums', 'products', 'categories'));
    }
          
    public function productDetail($slug){
        // $slug = $request->query('slug');
        // var_dump($kamar[0]->foto);
        // Get the current view count
        // $currentViews = DB::table('blogs')->where('slug', $slug)->value('views');
        // Increment the view count
        // DB::table('products')->where('slug', $slug)->update(['views' => ($currentViews + 1)]);
        $popularPosts = DB::table('blogs')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        $categories = DB::table('product_categories')->get();
        // $albums = DB::table('albums')->get();
        // $popularPosts = DB::table('blogs')->get();
        $productDetail = DB::table('products')->where('slug', $slug)->get();
        return view('pages.product-detail', compact('categories', 'productDetail', 'popularPosts'));
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
    public function contact(){

        // var_dump($kamar[0]->foto);
        $pages = Page::where('slug', 'contact')->first();
        return view('pages.contact', compact('pages'));
    }
    

}
