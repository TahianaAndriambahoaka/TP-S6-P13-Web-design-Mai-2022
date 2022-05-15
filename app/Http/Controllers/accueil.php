<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Image;

class accueil extends Controller
{
    public function index() {
        // Cache::forever('cle', 'voici la valeur du cache');
        // // Cache::flush();
        // dd(
        //     Cache::get('cle')
        // );
        return view('accueil');
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
        $img->resize(100, 100, function ($constraint) {
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
