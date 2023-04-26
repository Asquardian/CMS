<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public static function selectAll(){
        return Genre::selectAll();
    }

    public static function selectName(){
        return Genre::selectName();
    }
    
    public function add(GenreRequest $req){
        $genre = new Genre();
        $genre->name = $req->name;
        try{
            $genre->save();
        }
        catch(\Exception $ex){
            return redirect()->back()->withErrors(['msg' => 'Ошибка записи']);
        }
        return redirect('/anime');
    }
}
