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

    protected $anime, $genre, $exist, $req;
    public function __construct($req)
    {
        $this->anime = new AnimeController();
        $this->req = array();
        $this->req["ord"] = "DESC";
        $this->req["by"] = "anime.date";
        $this->req["start"] = "1970-01-01";
        $this->req["studio"] = '';
        $this->req["genre"] = '';
        if($req->exists('genre')) {
            $this->req["genre"] = json_encode($req->genre);
        }
        if ($req->exists('by') && $req->exists('ord')) {
            $this->req["ord"] = $this->ordToSQL($req->by, $req->ord);
            $this->req["by"] = $this->byToSQL($req->by);
        }
        if ($req->exists('start')) {
            $this->req["start"] = $req->start;
        }
        if ($req->exists('studio')) {
            $this->req["studio"] = $req->studio;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
            return view('components.all-anime', ['anime' => $this->anime->getAnimePage($this->req)]);
    }
}
