<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Entry;

class EntriesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            //ログインユーザー
            $user = \Auth::user();
            //ログインユーザーの仕事情報
            $jobs = $user->jobs();
            $entries = $user->entries()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'jobs' => $jobs,
                'entries' => $entries,
            ];
            $data += $this->counts($user);
            return view('users.entry_index', $data);
        }else {
            abort('404');
        }
    }

    //個別募集要項表示
    public function show($id)
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $entry = $user->entries()->find($id);

            if (is_null($entry) or \Auth::id() !== $entry->user_id) {
                abort('404');
    
            } else {
                $zip = substr($entry->zip,0,3) . "-" . substr($entry->zip,3);
                return view('users.entry_detail', [
                    'user' => $user,
                    'entry' => $entry,
                    'zip' => $zip,
                ]);                
            }
        };
    }
    
    //エントリー情報編集登録
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $user = \Auth::user();
        $entry = $user->entries()->find($id);
        $entry->status = $request->status;
        $entry->save();

        return redirect()->back()->with('message', '進捗状況を更新しました。');
    }

    //エントリーデータ削除
    public function destroy($id)
    {
        $entry = \App\Entry::find($id);

        if (\Auth::id() === $entry->user_id) {
            $entry->delete();
        }

        return redirect('/user/entries');
    }
}
