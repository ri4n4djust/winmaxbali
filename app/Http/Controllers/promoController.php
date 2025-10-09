<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
class promoController extends Controller
{
    //
    public function indexPromo(){
        $promos = Promo::all();
        $images = "";
        return view('admin.admin-promo', compact('promos', 'images'));

    }
    public function createPromo(){
        return view('admin.admin-promo-edit');
    }
    public function storePromo(Request $request){
        $promo = new Promo;
        $promo->title = $request->title;
        $promo->link = $request->link;
        $promo->status = $request->status;
        $promo->start_date = $request->start_date;
        $promo->end_date = $request->end_date;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $promo->image = $imageName;
            $image->move(public_path('images'), $imageName);
        }
        $promo->save();
        return redirect()->route('admin.promo');
    }
    public function editPromo($id){
        $promo = Promo::find($id);
        
        return view('admin.admin-promo-edit', compact('promo'));
    }
    public function updatePromo(Request $request, $id){
        $promo = Promo::find($id);
        $promo->title = $request->title;
        $promo->link = $request->link;
        $promo->status = $request->status;
        $promo->start_date = $request->start_date;
        $promo->end_date = $request->end_date;
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('images') . '/' . $promo->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $promo->image = $imageName;
            $image->move(public_path('images'), $imageName);
        }
        $promo->save();
        return redirect()->route('admin.promo');
    }
    public function deletePromo($id){
        $promo = Promo::find($id);
        // $promo->delete();
        if ($promo) {
            $promo->delete();
            return response()->json(['success' => true, 'message' => 'Record deleted successfully.']);
        }
    
        return response()->json(['success' => false, 'message' => 'Record not found.']);
        // return redirect()->route('admin.promo');
    }   
}
