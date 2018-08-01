<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
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
    
     //個別ユーザー登録情報
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user_detail', [
            'user' => $user,
        ]);
    }
     //個別ユーザー登録編集フォーム
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user_edit', [
            'user' => $user,
        ]);
    }
    
    //個別ユーザー登録編集内容保存
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',

        ]);
        
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        // 飛ばしたいURLは /admin/{display_url}　->　'/admin/'.$user->display_url 
        return redirect('/'.$user->id);
    }
}
