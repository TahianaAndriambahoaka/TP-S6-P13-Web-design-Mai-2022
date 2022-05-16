<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class causes extends Controller
{
    public function index() {
        $articles = DB::Select("select * from article where type='ca' order by dateheure DESC");
        return view('causes', ['articles'=>$articles]);
    }
    public function details($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'causes/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $data = DB::Select(sprintf("select * from article where type='ca' and id = %d and url = '%s'", $id, $url));
        $articles = DB::Select("select * from article where type='ca' order by dateheure DESC");
        return view('causes', ['data'=>$data, 'articles'=>$articles]);
    }
}
