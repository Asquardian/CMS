<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudiosRequest;
use App\Models\Studios;

class StudiosController extends Controller
{
    public function add(StudiosRequest $request)
    {
        $time = strtotime($request->input('date'));

        $studios = new Studios();
        $studios->name = $request->input('name');
        $studios->create =  date('Y-m-d H:i:s', $time);
        $studios->description = $request->input('desc');
        try {
            $studios->save();
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['msg' => $ex->getMessage()]);
        }
        return redirect('/anime');
    }
}
