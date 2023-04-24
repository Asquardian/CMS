<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AnimeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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

}
