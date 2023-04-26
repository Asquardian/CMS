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
    
    public function getAnimePageGenre($by, $ord, $genre){

        $genre = Genre::strToSql($genre);

        $anime = DB::table('anime')->join('studios', 'anime.studio', '=', 'studios.id')->whereRaw('JSON_CONTAINS(genre, ' . 
        $genre
         . ', \'$\')')
        ->orderBy($by, $ord)
        ->leftJoin('anime_info', 'anime.id', '=', 'anime_info.anime')
        ->select(['anime.*', 'studios.name as studio', 'anime_info.description'])->paginate(3);
        return $anime;
    }
}
