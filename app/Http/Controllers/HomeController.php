<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Job;
use App\Entry;

class HomeController extends Controller
{
    //TOPページ表示
    public function index()
    {
        $jobs = Job::all();

        return view('welcome', [
            'jobs' => $jobs,
        ]);
    }

    //個別ユーザー（会社）TOPページ表示
    public function company($id)
    {
        // 会社がなかったときは？
        $user = User::where('display_url', $id)->first(); // display_url が存在しないときもある。

        if (is_null($user)) {
            return redirect('/');

        } else {
            $jobs = $user->jobs()->where('release', 'release')->orderBy('created_at', 'desc')->paginate(10);
    
            $data = [
                'user' => $user,
                'jobs' => $jobs,
            ];
            $data += $this->counts($user);
    
            return view('home.user_detail', $data);
        };
        
    }
    
    //個別ユーザー登録情報
    public function search_result(Request $request, $id)
    {
        $user = User::where('display_url', $id)->first();
        
        $job_category = $request->job_category;
        $job_status = $request->job_status;
        $pref = $request->pref;
        
        $jobs = $user->jobs()
            ->where('release', 'release')
            ->where('job_category', $job_category)
            ->where('job_status', $job_status)
            ->where('pref', $pref)
            ->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'jobs' => $jobs,
            'job_category' => $job_category,
            'job_status' => $job_status,
            'pref' => $pref,
        ];
        $data += $this->counts($user);
        return view('home.search_result', $data);
    }

    //個別募集要項表示
    public function show($display_url, $id)
    {
        // 会社がなかったときは？
        $user = User::where('display_url', $display_url)->first();  // display_url が存在しないときもある。
        if (is_null($user)) {
            return redirect('/');
        } else {
            $job = $user->jobs()->find($id);
            if (is_null($job)) {
                return redirect('/');
            }
        };

        // $job が公開か非公開か判別して　非公開だったら 「ページは存在しません」などのビューを表示

        return view('home.user_job', [
            'user' => $user,
            'job' => $job,
        ]);
    }

    //エントリーフォーム
    public function create($display_url, $id)
    {
        $user = User::where('display_url', $display_url)->first();
        $job = Job::find($id);
        $entry = new Entry;
        
        return view('home.entry', [
            'user' => $user,
            'job' => $job,
            'entry' => $entry,
        ]);
    }
    
    // 確認画面
    public function confirm(Request $request, $display_url, $id)
    {
        // データを受け取る(postで飛んでくるのでsotreと同じ仕組み)
        $this->validate($request, [
            'name' => 'required|max:191',
            'gender' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'mail' => 'required|email',
            'tel' => 'required|numeric',
        ]);
        
        $entry = new Entry;
        $entry->job_name = $request->job_name;
        $entry->job_place = $request->job_place;
        $entry->name = $request->name;
        $entry->gender = $request->gender;
        $entry->year = $request->year;
        $entry->month = $request->month;
        $entry->day = $request->day;
        $entry->mail = $request->mail;
        $entry->tel = $request->tel;
        $entry->zip = $request->zip;
        $entry->address = $request->address;
        $entry->carreer = $request->carreer;
        $entry->qualification = $request->qualification;
        $entry->myself = $request->myself;

        // 画面にデータを表示する(ただのビューの表示なので createと同じ仕組み）)
        $user = User::where('display_url', $display_url)->first();
        $job = Job::find($id);
        
        return view('home.entry_confirm', [
            'user' => $user,
            'job' => $job,
            'entry' => $entry,
        ]);
    }
    
    //入力内容保存
    public function store(Request $request, $display_url, $id)
    {
        $user = User::where('display_url', $display_url)->first();
        $job = Job::find($id);
        
        $input = $request->except('action');
        if ($request->action === '戻る') {
        return redirect()
            ->route('entry.get', ['display_url' => $user->display_url, 'id' => $job->id])
            ->withInput($input);
        }
        
        $birthday = $request->year. '年'. $request->month. '月'. $request->day. '日';

        $entry = new Entry;
        $entry->user_id = User::where('display_url', $display_url)->first()->id;
        $entry->job_id = Job::find($id)->id;
        $entry->job_name = $request->job_name;
        $entry->job_place = $request->job_place;
        $entry->name = $request->name;
        $entry->gender = $request->gender;
        $entry->birthday = $birthday;
        $entry->mail = $request->mail;
        $entry->tel = $request->tel;
        $entry->zip = $request->zip;
        $entry->address = $request->address;
        $entry->carreer = $request->carreer;
        $entry->qualification = $request->qualification;
        $entry->myself = $request->myself;
        $entry->save();
        
        // 送信メール
        \Mail::send(new \App\Mail\EntryMail([
            'to' => $request->mail,
            'to_name' => $request->name,
            'from' => $job->sender_mail,
            'from_name' => $user->company,
            'subject' => 'ご応募ありがとうございました',
            'gender' => $request->gender,
            'birthday' => $birthday,
        ]));
     
        // 受信メール
        \Mail::send(new \App\Mail\EntryMail([
            'to' => $job->sender_mail,
            'to_name' => $user->company,
            'from' => $request->mail,
            'from_name' => $request->name,
            'subject' => '採用サイトからの応募を受付けました',
            'gender' => $request->gender,
            'birthday' => $birthday,
        ], 'from'));
        
        // 二重送信防止
        $request->session()->regenerateToken();
        
        return view('home.entry_thanks', [
            'user' => $user,
            'job' => $job,
            'entry' => $entry,
        ]);

    }
}
