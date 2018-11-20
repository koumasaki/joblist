<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
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

    //エントリー絞り込み検索
    public function search_result(Request $request)
    {
        $data = [];
        if (\Auth::check()) {
            //ログインユーザー
            $user = \Auth::user();

            $name = $request->name;
            $status = $request->status;
            
            $jobs = $user->jobs();
            $entries = $user->entries()->where('name', 'LIKE', '%'.$name.'%');

            if (!is_null($status)) {
                $entries = $entries->where('status', $status);
            }
            $entries = $entries->orderBy('created_at', 'desc')->paginate(2);

            $data = [
                'user' => $user,
                'jobs' => $jobs,
                'entries' => $entries,
                'name' => $name,
                'status' => $status,
            ];
            $data += $this->counts($user);
            return view('users.entry_search', $data);
        }else {
            abort('404');
        }
    }
    
    //募集要項別のエントリー一覧
    public function refine($id)
    {
        $data = [];
        if (\Auth::check()) {
            //ログインユーザー
            $user = \Auth::user();
            //ログインユーザーの仕事情報
            $jobs = $user->jobs();
            $job = $user->jobs()->find($id);
            if(is_null($job) or $id != $job->id) {
                abort('404');
            } else {
                $entries = $user->entries()->where('job_id', $id)->orderBy('created_at', 'desc')->paginate(10);
            }

            $data = [
                'user' => $user,
                'jobs' => $jobs,
                'job' => $job,
                'entries' => $entries,
            ];
            $data += $this->counts($user);
            return view('users.entry_refine', $data);
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
                $mailtemplates = $user->mailtemplates()->get();
                $sendmails = $user->sendmails()->where('entry_id', $id)->orderBy('created_at', 'desc')->paginate(20);
                $recruiters = $user->recruiters()->get();

                return view('users.entry_detail', [
                    'user' => $user,
                    'entry' => $entry,
                    'zip' => $zip,
                    'mailtemplates' => $mailtemplates,
                    'sendmails' => $sendmails,
                    'recruiters' => $recruiters,
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

    public function downloadCSV()
    {
        $user = \Auth::user();
        $entries = \App\Entry::where('user_id', $user->id)->get(['name', 'gender', 'birthday', 'mail', 'tel', 'zip', 'address', 'carreer', 'qualification', 'myself', 'created_at'])->toArray();
        $csvHeader = ['名前', '性別', '生年月日', 'メールアドレス', '電話番号', '郵便番号', '住所', '職務経歴', '保有資格', '自己PR', '登録日'];
        array_unshift($entries, $csvHeader);   
        $stream = fopen('php://temp', 'r+b');
        foreach ($entries as $entry) {
          fputcsv($stream, $entry);
        }
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        );
        return \Response::make($csv, 200, $headers);
    }
}
