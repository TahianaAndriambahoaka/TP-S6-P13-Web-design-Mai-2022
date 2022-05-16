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
    public function details($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'solutions/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $data = DB::Select(sprintf("select * from article where type='so' and id = %d and url = '%s'", $id, $url));
        $articles = DB::Select("select * from article where type='so' order by dateheure DESC");
        return view('solutions', ['data'=>$data, 'articles'=>$articles]);
    }
}
