<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Cache;

class admin extends Controller
{
    public function index() {
        return view('admin.login');
    }
    public function login(Request $request) {
        $login = $request->input('login');
        $mdp = $request->input('mdp');
        if (count(DB::Select(sprintf("select * from admin where login='%s' and mdp = md5('%s')", $login, $mdp)))==0) {
            if (Cache::get('admin.login')=="") {
                Cache::put('admin.login', View('/admin.login', ['erreur'=>'Login ou mot de passe incorrect'])->render(), 604800);
                return View('admin.login', ['erreur'=>'Login ou mot de passe incorrect']);
            } else {
                return Cache::get('admin.login');
            }
        } else {
            return View('admin.accueil', ['data'=>DB::Select("select * from article where type='ca' order by dateheure desc")]);
        }
    }
    public function logout() {
        if (Cache::get('admin.login')=="") {
            Cache::put('admin.login', View('admin.login')->render(), 604800);
            return View('admin.login', ['erreur'=>'Login ou mot de passe incorrect']);
        } else {
            return Cache::get('admin.login');
        }
    }
    public function causes() {
        return view('admin.accueil', ['data'=>DB::Select("select * from article where type='ca' order by dateheure desc")]);
    }
    public function consequences() {
        return view('admin.consequences', ['data'=>DB::Select("select * from article where type='co' order by dateheure desc")]);
    }
    public function solutions() {
        return view('admin.solutions', ['data'=>DB::Select("select * from article where type='so' order by dateheure desc")]);
    }

    // causes
    public function ajouterCause(Request $request) {
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $nomImage = str_slug($titre, '-');
        $url = 'causes/'.$nomImage;
        $this->validate($request, [
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
        $sql = "";
        if ($request->file('image')!="") {
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $extension = explode('.', $extension);
            $nomImage .= '.'.$extension[count($extension)-1];
            $destinationPath = public_path('images');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$nomImage);
            $sql = sprintf("INSERT INTO article VALUES (DEFAULT, '%s', '%s', '%s', '%s', NOW(), 'ca')", $titre, $contenu, $nomImage, $url);
        } else {
            $sql = sprintf("INSERT INTO article VALUES (DEFAULT, '%s', '%s', NULL, '%s', NOW(), 'ca')", $titre, $contenu, $url);
        }
        if(DB::insert($sql)) {
            return back()->with('insertok','Article inséré avec succès');
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function modifierCause(Request $request) {
        $id = $request->input('id');
        $titre = $request->input('titre');
        $url = 'causes/'.str_slug($titre, '-');
        $contenu = $request->input('contenu');
        $sql = sprintf("UPDATE article SET titre='%s', contenu='%s', url='%s' WHERE type='ca' AND id=%d", $titre, $contenu, $url, $id);
        if(DB::update($sql)) {
            // return back()->with('updateok','Article modifié avec succès');
            return view('admin.accueil', ['info'=>DB::select(sprintf("select * from article where type='ca' and id = %d and url = '%s'", $id, $url))]);
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function rechercheCause(Request $request) {
        $motcle = $request->input('motcle');
        return view('admin.accueil', ['data'=>DB::Select("select * from article where type='ca' and (titre like '%".$motcle."%' or contenu like '%".$motcle."%') order by dateheure desc")]);
    }
    public function suppressionCause($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'causes/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $sql = sprintf("delete from article where id = (select id from article where type='ca' and id = %d and url = '%s')", $id, $url);
        if(DB::delete($sql)) {
            return back()->with('deleteok','Article supprimé avec succès');
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function modificationCause($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'causes/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $sql = sprintf("select * from article where type='ca' and id = %d and url = '%s'", $id, $url);
        return view('admin.accueil', ['info'=>DB::select($sql)]);
    }


    
    // conséquences
    public function ajouterConsequence(Request $request) {
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $nomImage = str_slug($titre, '-');
        $url = 'consequences/'.$nomImage;
        $this->validate($request, [
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
        $sql = "";
        if ($request->file('image')!="") {
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $extension = explode('.', $extension);
            $nomImage .= '.'.$extension[count($extension)-1];
            $destinationPath = public_path('images');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$nomImage);
            $sql = sprintf("INSERT INTO article VALUES (DEFAULT, '%s', '%s', '%s', '%s', NOW(), 'co')", $titre, $contenu, $nomImage, $url);
        } else {
            $sql = sprintf("INSERT INTO article VALUES (DEFAULT, '%s', '%s', NULL, '%s', NOW(), 'co')", $titre, $contenu, $url);
        }
        if(DB::insert($sql)) {
            return back()->with('insertok','Article inséré avec succès');
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function modifierConsequence(Request $request) {
        $id = $request->input('id');
        $titre = $request->input('titre');
        $url = 'consequences/'.str_slug($titre, '-');
        $contenu = $request->input('contenu');
        $sql = sprintf("UPDATE article SET titre='%s', contenu='%s', url='%s' WHERE type='co' AND id=%d", $titre, $contenu, $url, $id);
        if(DB::update($sql)) {
            // return back()->with('updateok','Article modifié avec succès');
            return view('admin.consequences', ['info'=>DB::select(sprintf("select * from article where type='co' and id = %d and url = '%s'", $id, $url))]);
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function rechercheConsequence(Request $request) {
        $motcle = $request->input('motcle');
        return view('admin.consequences', ['data'=>DB::Select("select * from article where type='co' and (titre like '%".$motcle."%' or contenu like '%".$motcle."%') order by dateheure desc")]);
    }
    public function suppressionConsequence($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'consequences/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $sql = sprintf("delete from article where id = (select id from article where type='co' and id = %d and url = '%s')", $id, $url);
        if(DB::delete($sql)) {
            return back()->with('deleteok','Article supprimé avec succès');
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function modificationConsequence($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'consequences/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $sql = sprintf("select * from article where type='co' and id = %d and url = '%s'", $id, $url);
        return view('admin.consequences', ['info'=>DB::select($sql)]);
    }


    
    // solutions
    public function ajouterSolution(Request $request) {
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $nomImage = str_slug($titre, '-');
        $url = 'solutions/'.$nomImage;
        $this->validate($request, [
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
        $sql = "";
        if ($request->file('image')!="") {
            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $extension = explode('.', $extension);
            $nomImage .= '.'.$extension[count($extension)-1];
            $destinationPath = public_path('images');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$nomImage);
            $sql = sprintf("INSERT INTO article VALUES (DEFAULT, '%s', '%s', '%s', '%s', NOW(), 'so')", $titre, $contenu, $nomImage, $url);
        } else {
            $sql = sprintf("INSERT INTO article VALUES (DEFAULT, '%s', '%s', NULL, '%s', NOW(), 'so')", $titre, $contenu, $url);
        }
        if(DB::insert($sql)) {
            return back()->with('insertok','Article inséré avec succès');
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function modifierSolution(Request $request) {
        $id = $request->input('id');
        $titre = $request->input('titre');
        $url = 'solutions/'.str_slug($titre, '-');
        $contenu = $request->input('contenu');
        $sql = sprintf("UPDATE article SET titre='%s', contenu='%s', url='%s' WHERE type='so' AND id=%d", $titre, $contenu, $url, $id);
        if(DB::update($sql)) {
            // return back()->with('updateok','Article modifié avec succès');
            return view('admin.solutions', ['info'=>DB::select(sprintf("select * from article where type='so' and id = %d and url = '%s'", $id, $url))]);
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function rechercheSolution(Request $request) {
        $motcle = $request->input('motcle');
        return view('admin.solutions', ['data'=>DB::Select("select * from article where type='so' and (titre like '%".$motcle."%' or contenu like '%".$motcle."%') order by dateheure desc")]);
    }
    public function suppressionSolution($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'solutions/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $sql = sprintf("delete from article where id = (select id from article where type='so' and id = %d and url = '%s')", $id, $url);
        if(DB::delete($sql)) {
            return back()->with('deleteok','Article supprimé avec succès');
        } else {
            return back()->with('erreur',"Une erreur s'est produite");
        }
    }
    public function modificationSolution($param) {
        $exp = explode('-',$param);
        $id = $exp[count($exp)-1];
        $url = 'solutions/'.$exp[0];
        for ($i=1; $i < count($exp)-1; $i++) $url.='-'.$exp[$i];
        $sql = sprintf("select * from article where type='so' and id = %d and url = '%s'", $id, $url);
        return view('admin.solutions', ['info'=>DB::select($sql)]);
    }
}