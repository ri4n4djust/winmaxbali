<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    //
    public function projectDetail(){

        // var_dump($kamar[0]->foto);
        return view('pages.project-detail');
    }
}
