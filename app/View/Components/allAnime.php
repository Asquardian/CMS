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

    protected $anime, $by, $ord, $genre, $exist;
    public function __construct($req)
    {
        $this->anime = new AnimeController();
        if($req->exists('genre')) {
            $this->genre = json_encode($req->genre);
        }
        else if ($req->exists('by') && $req->exists('ord')) {
            $this->ord = $this->ordToSQL($req->by, $req->ord);
            $this->by = $this->byToSQL($req->by);
        } 
         
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (!empty($this->genre)) {
            return view('components.all-anime', ['anime' => $this->anime->getAnimePage('date', 'DESC', $this->genre)]);
        }
        if (!empty($this->by)) {
            return view('components.all-anime', ['anime' => $this->anime->getAnimePage($this->by, $this->ord)]);
        }
            return view('components.all-anime', ['anime' => $this->anime->getAnimePage()]);
    }
}
