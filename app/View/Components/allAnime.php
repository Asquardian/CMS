<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\AnimeController;

class allAnime extends Component
{
    /**
     * Create a new component instance.
     */


    private function byToSQL($by)
    {
        switch ($by) {
            case 'name':
                return 'anime.name';
            case 'date':
                return 'anime.date';
            case 'rating':
                return 'anime.rating';
        }
    }

    private function ordToSQL($by, $ord)
    {
        if ($by == 'date' && $ord == "ASC") {
            return 'DESC';
        }
        if ($by == 'date' && $ord == "DESC") {
            return 'ASC';
        }
        return $ord;
    }

    protected $anime, $by, $ord;
    public function __construct($by, $ord)
    {
        $this->ord = $this->ordToSQL($by, $ord);
        $this->by = $this->byToSQL($by);
        $this->anime = new AnimeController();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-anime', ['anime' => $this->anime->getAnimePage($this->by, $this->ord)]);
    }
}
