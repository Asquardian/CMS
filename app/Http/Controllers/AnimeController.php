<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AnimeRequest;
use Illuminate\Support\Str;
use App\Models\Anime;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AnimeController extends Controller
{

    private function saveImg($file)
    {
        $fileName   = time() . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $img->stream(); // <-- Key point

        Storage::disk('public')->put($fileName, $img, 'public');
        return $fileName;
    }

    public function add(AnimeRequest $request)
    {
        $time = strtotime($request->input('date'));

        $anime = new Anime();
        $anime->name = $request->input('name');
        $anime->date =  date('Y-m-d H:i:s', $time);
        $anime->studio = $request->input('studio');
        $anime->state = $request->input('state');
        //$anime->studio = $request->file('image');
        $anime->image = $this->saveImg($request->file('image'));
        $anime->url = $request->input('url');
        try {
            $anime->save();
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['msg' => 'Ошибка записи. Такой URL уже существует']);
        }
        return redirect('/anime/' . $anime->url);
    }

    public function getAnimePageDefault()
    {
        $anime = new Anime();
        return $anime->getAnimePage('anime.date', 'DESC');
    }

    public function getAnimePageBy($by, $ord)
    {
        $anime = new Anime();
        return $anime->getAnimePage($by, $ord);
    }

    public function __call($method, $args)
    {
        $argscnt = count($args);
        if ($method == 'getAnimePage') {
            switch ($argscnt) {
                case 0:
                    return call_user_func_array(array($this, 'getAnimePageDefault'), $args);
                case 2:
                    return call_user_func_array(array($this, 'getAnimePageBy'), $args);
            }
        }
    }

    public function autocomplete(Request $request)
    {
        $res = Anime::select("name", "url")
                ->where("name","LIKE","%{$request->term}%")->limit(5)
                ->get();
    
        return response()->json($res);
    }
}
