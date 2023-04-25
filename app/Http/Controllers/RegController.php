<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);
        $userInfo = new UserInfo();
        $userInfo->user = auth()->id();
        try {
            $userInfo->save();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

        return redirect('/');
    }
}
