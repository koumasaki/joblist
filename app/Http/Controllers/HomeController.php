<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    //個別ユーザー登録情報
    public function company($id)
    {
        $user = User::where('display_url', $id)->first();

        return view('home.user_detail', [
            'user' => $user,
        ]);
    }
}
