<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Admin;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    //サインアップ後の登録一覧
    public function view_all()
    {
        $users = User::all();

        return view('admin.view_all', [
            'users' => $users,
        ]);
    }
    
    //ユーザー登録削除
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
    
    //ユーザー新規登録
    public function user_create()
    {
        $user = new User;
        return view('admin.register', [
            'user' => $user,
        ]);
    }
    public function user_store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required|string|max:255',
            'display_url' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        //createで保存
        $user = User::create([
            'company' => $request->company,
            'display_url' => $request->display_url,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        return redirect('/admin');
    }

}
