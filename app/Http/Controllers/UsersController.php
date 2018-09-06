<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Image;

class UsersController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $jobs = $user->jobs()->where('release', 'release')->orderBy('created_at', 'desc')->paginate(10);
            $today = date("Y-m-d");
            $entries = $user->entries()->whereDate('created_at', $today)->orderBy('created_at', 'desc')->get();
            
            $data = [
                'user' => $user,
                'jobs' => $jobs,
                'entries' => $entries,
            ];
            $data += $this->counts($user);
            return view('users.index', $data);
        }else {
            return view('welcome');
        }
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
        $user->retarge_tag = $request->retarge_tag;
        $user->cv_tag = $request->cv_tag;
        
        //メイン画像
        if($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = $user->display_url . '_' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/main_image/'. $filename);
            Image::make($image)->resize(1600, null, function ($constraint) {
                $constraint->aspectRatio();})->save($location);
            
            $user->main_image = $filename;
        }
        //ロゴ
        if($request->hasFile('logo_image')) {
            $image_logo = $request->file('logo_image');
            $filename_logo = $user->display_url . '_' . time() . '.' . $image_logo->getClientOriginalExtension();
            $location_logo = public_path('images/logo/'. $filename_logo);  // S3を使う雑な例： Storage('local')->put('filepath', 'データ', 'public')
            Image::make($image_logo)->save($location_logo);
            
            $user->logo_image = $filename_logo;
        }
        
        $user->save();

        // 飛ばしたいURLは /admin/{display_url}　->　'/admin/'.$user->display_url 
        return redirect('/user/'.$user->id);
    }
}
