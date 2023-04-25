<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $table = 'anime';
    public function index(): View
    {
        $thisAnime = DB::table('anime')->join('studios', 'anime.studio', '=', 'studios.id')
            ->leftJoin('anime_info', 'anime.id', '=', 'anime_info.anime')
            ->select(['anime.*', 'studios.name as studio', 'anime_info.description'])->where('url', $this->url)->paginate(10)->get();
    }
}
