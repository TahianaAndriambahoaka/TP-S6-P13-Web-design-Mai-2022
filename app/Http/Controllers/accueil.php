<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class accueil extends Controller
{
    public function index() {
        if (Cache::get('accueil')=="") {
            $articles = DB::Select('select * from article order by dateheure DESC limit 6');
            Cache::put('accueil', view('accueil', ['articles'=>$articles])->render(), 604800);
            return view('accueil', ['articles'=>$articles]);
        } else {
            return Cache::get('accueil');
        }
    }

    public function resizeImage()
    {
        return view('welcome');
    }
  
    public function resizeImagePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
  
        $image = $request->file('image');
        $input['imagename'] = time().'_'.$image->getClientOriginalName();
     
        $destinationPath = public_path('thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('images');
        $image->move($destinationPath, $input['imagename']);
   
        // $this->postImage->add($input);
   
        return back()
            ->with('success','Image Upload successful')
            ->with('imageName',$input['imagename']);
    }
}
