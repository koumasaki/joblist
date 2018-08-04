<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Image;

class UsersController extends Controller
{
    //ユーザー登録削除
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
    
     //個別ユーザー登録情報
    public function show($id)
    {
        $user = User::find($id);

        return view('users.user_detail', [
            'user' => $user,
        ]);
    }
     //個別ユーザー登録編集フォーム
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.user_edit', [
            'user' => $user,
        ]);
    }
    
    //個別ユーザー登録編集内容保存
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'zip' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'main_image' => 'file|image|dimensions:min_width=1600',
            'logo_image' => 'file|image|dimensions:max_width=250',
        ]);
        
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        
        //メイン画像
        if($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = $user->display_url . '_' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/main_image/'. $filename);
            Image::make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();})->save($location);
            
            $user->main_image = $filename;
        }
        //ロゴ
        if($request->hasFile('logo_image')) {
            $image_logo = $request->file('logo_image');
            $filename_logo = $user->display_url . '_' . time() . '.' . $image_logo->getClientOriginalExtension();
            $location_logo = public_path('images/logo/'. $filename_logo);
            Image::make($image_logo)->save($location_logo);
            
            $user->logo_image = $filename_logo;
        }
        
        $user->save();

        // 飛ばしたいURLは /admin/{display_url}　->　'/admin/'.$user->display_url 
        return redirect('/user/'.$user->id);
    }
}
