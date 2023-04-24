<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class allAnime extends Component
{
    /**
     * Create a new component instance.
     */

    protected $anime;
    public function __construct()
    {
        $this->anime = DB::table('anime')->join('studios', 'anime.studio', '=', 'studios.id')
        ->leftJoin('anime_info', 'anime.id', '=', 'anime_info.anime')
        ->select(['anime.*', 'studios.name as studio', 'anime_info.description'])->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-anime', ['anime' => $this->anime]);
    }
}
