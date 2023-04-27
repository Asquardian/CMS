<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class Anime extends Model
{
    use HasFactory;
    protected $table = 'anime';
    
    public function getAnimePage($by, $ord){
        $anime = DB::table('anime')->join('studios', 'anime.studio', '=', 'studios.id')->orderBy($by, $ord)
        ->leftJoin('anime_info', 'anime.id', '=', 'anime_info.anime')
        ->select(['anime.*', 'studios.name as studio', 'anime_info.description'])->paginate(3);
        return $anime;
    }
    
    public function getAnimePageAll($req){
        $genre = '';
        if($req["genre"] != ''){
            $genre = 'JSON_CONTAINS(genre, ' . Genre::strToSql($req["genre"]) . ', \'$\') AND';
        }
        $str = '';
        if($req["studio"] != ''){
            $str = ' AND studios.id = ' . $req["studio"];
        }

        $anime = DB::table('anime')->join('studios', 'anime.studio', '=', 'studios.id')->whereRaw($genre . 
        ' anime.date > \'' . $req["start"] . "'" . $str)
        ->orderBy($req["by"], $req["ord"])
        ->leftJoin('anime_info', 'anime.id', '=', 'anime_info.anime')
        ->select(['anime.*', 'studios.name as studio', 'studios.id as studioid', 'anime_info.description'])->paginate(9);
        return $anime;
    }
}
