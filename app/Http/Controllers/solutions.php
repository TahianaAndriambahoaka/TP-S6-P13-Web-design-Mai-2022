<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class solutions extends Controller
{
    public function index() {
        $articles = DB::Select("select * from article where type='so' order by dateheure DESC");
        return view('solutions', ['articles'=>$articles]);
    }
}
