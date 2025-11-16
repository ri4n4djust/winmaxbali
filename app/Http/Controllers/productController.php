<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class productController extends Controller
{
    //
    public function index(Request $request, $slug)
    {
        $search = $request->query('q');
        $category = $request->query('category');
        if($search == ''){
            $cr = 'all';
        }
        $perPage = $request->query('perPage', 12); // Default to 12 if not provided

        if ($search != null && $search != 'all') {
            $products = DB::table('products')->where('name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate($perPage);
        } elseif ($category != null) {
            // if category is numeric assume it's an ID, otherwise treat as slug
            if (is_numeric($category)) {
                $products = DB::table('products')->where('category_id', $category)->orderBy('id', 'desc')->paginate($perPage);
            } else {
                $cat = DB::table('product_categories')->where('code_cat', $category)->first();
                if ($cat) {
                    $products = DB::table('products')->where('category_id', $cat->code_cat)->orderBy('id', 'desc')->paginate($perPage);
                } else {
                    // fallback to all products if category query is invalid
                    $products = DB::table('products')->orderBy('id', 'desc')->paginate($perPage);
                }
            }
        } elseif ($slug == 'all') {
            $products = DB::table('products')->orderBy('id', 'desc')->paginate($perPage);
        } elseif ($cr == 'all') {
            $products = DB::table('products')->orderBy('id', 'desc')->paginate($perPage);
        } else {
            $categories = DB::table('product_categories')->where('code_cat', $category)->first();
            if($categories){
                $products = DB::table('products')->where('category_id', $categories->code_cat)->orderBy('id', 'desc')->paginate($perPage);
            } else {
                $products = [];
            }
        }
        return view('admin.admin-product', compact('products'));
    }

    public function edit($id)
    {
        //
        $products = Product::find($id);
        $category = DB::table('product_categories')->get();
        return view('admin.admin-product-edit', compact('products', 'category'));
    }
    public function update(Request $request, $id)
    {
        //
    }

}
