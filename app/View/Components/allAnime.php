<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Anime;

class allAnime extends Component
{
    /**
     * Create a new component instance.
     */

    protected $anime;
    public function __construct()
    {
        $this->anime = new Anime();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $showAll = $this->anime::all();
        return view('components.all-anime', ['anime' => $showAll]);
    }
}
