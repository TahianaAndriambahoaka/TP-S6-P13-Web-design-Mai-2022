<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consequences extends Controller
{
    public function index() {
        $articles = DB::Select("select * from article where type='co' order by dateheure DESC");
        return view('consequences', ['articles'=>$articles]);
    }
}
