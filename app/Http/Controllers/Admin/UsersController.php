<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Admin;
use Image;

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
            'name' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
        ]);
        
        //createで保存
        $user = new User;
        $user->company = $request->company;
        $user->display_url = $request->display_url;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->zip = $request->zip;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->section = $request->section;
        $user->catch_copy = $request->catch_copy;
        $user->company_copy = $request->company_copy;
        $user->company_summary = $request->company_summary;
        $user->establishment = $request->establishment;
        $user->capitalstock = $request->capitalstock;
        $user->number = $request->number;
        $user->president = $request->president;
        $user->site_url = $request->site_url;
        $user->privacy_url = $request->privacy_url;
        $user->service_copy = $request->service_copy;
        $user->service_summary = $request->service_summary;
        $user->copyright = $request->copyright;
        
        //メイン画像
        //dd($request->hasFile('main_image'));
        if($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = $request->display_url . '_' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/main_image/'. $filename);
            Image::make($image)->resize(1600, null, function ($constraint) {
                $constraint->aspectRatio();})->save($location);
            
            $user->main_image = $filename;
        }
        //ロゴ
        if($request->hasFile('logo_image')) {
            $image_logo = $request->file('logo_image');
            $filename_logo = $request->display_url . '_' . time() . '.' . $image_logo->getClientOriginalExtension();
            $location_logo = public_path('images/logo/'. $filename_logo);
            Image::make($image_logo)->save($location_logo);
            
            $user->logo_image = $filename_logo;
        }
        
        $user->save();
        
        return redirect('/admin');
    }

}
