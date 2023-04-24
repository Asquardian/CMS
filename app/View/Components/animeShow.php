<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class animeShow extends Component
{
    /**
     * Create a new component instance.
     */

    protected $url, $anime;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $thisAnime = DB::table('anime')->join('studios', 'anime.studio', '=', 'studios.id')
        ->leftJoin('anime_info', 'anime.id', '=', 'anime_info.anime')
        ->select(['anime.*', 'studios.name as studio', 'anime_info.description'])->where('url', $this->url)->get();
        return view('components.anime-show', ['anime' => $thisAnime]);
    }
}
