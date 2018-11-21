<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Job;
use App\Entry;
use App\Recruiter;

class HomeController extends Controller
{
    //TOPページ表示
    public function index()
    {
        $jobs = Job::where('release', 'release')->orderBy('created_at', 'desc')->get();

        return view('welcome', [
            'jobs' => $jobs,
        ]);
    }

    //xmlファイル作成
    public function sitemap()
    {
        $jobs = Job::where('release', 'release')->orderBy('created_at', 'desc')->get();
        
        return response()->view('indeed', ['jobs' => $jobs])->header('Content-Type', 'text/xml');
    }
    
    //個別ユーザー（会社）TOPページ表示
    public function company($id)
    {
        // 会社がなかったときは？
        $user = User::where('display_url', $id)->first(); // display_url が存在しないときもある。

        if (is_null($user)) {
            abort('404');

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
    
    //絞り込み検索結果
    public function search_result(Request $request, $id)
    {
        $user = User::where('display_url', $id)->first();
        
        if (is_null($user)) {
            abort('404');

        } else {

            $job_category = $request->job_category;
            $job_status = $request->job_status;
            $pref = $request->pref;
            
            $jobs = $user->jobs()
                    ->where('release', 'release')
                    ->orderBy('created_at', 'desc')->paginate(10);
            
            if (!is_null($job_category)) {
                $jobs = $jobs->where('job_category', $job_category);
            }
            if (!is_null($job_status)) {
                $jobs = $jobs->where('job_status', $job_status);
            }
            if (!is_null($pref)) {
                $jobs = $jobs->where('pref', $pref);
            }
    
            $data = [
                'user' => $user,
                'jobs' => $jobs,
            ];
            $data += $this->counts($user);
            return view('home.search_result', $data);
        };
    }

    //個別募集要項表示
    public function show($display_url, $id)
    {
        // 会社がなかったときは？
        $user = User::where('display_url', $display_url)->first();  // display_url が存在しないときもある。
        if (is_null($user)) {
            abort('404');
        } else {
            $job = $user->jobs()->find($id);
            if (is_null($job)) {
                abort('404');
            }
            $recruiter_id = $job->recruiter;
            $recruiter = $user->recruiters()->where('id', $recruiter_id)->first();

        };

        // $job が公開か非公開か判別して　非公開だったら 「ページは存在しません」などのビューを表示
        if ($job->release === 'unrelease') {
            abort('404');
        };

        return view('home.user_job', [
            'user' => $user,
            'job' => $job,
            'recruiter' => $recruiter,
            'recruiter_id' => $recruiter_id,
        ]);
    }

    //エントリーフォーム（簡易）
    public function light_create($display_url, $id)
    {
        $user = User::where('display_url', $display_url)->first();
        if (is_null($user)) {
            abort('404');

        } else {
            $job = $user->jobs()->find($id);
            if (is_null($job)) {
                abort('404');
            }
        };

        $entry = new Entry;
        
        return view('home.light_entry', [
            'user' => $user,
            'job' => $job,
            'entry' => $entry,
        ]);
    }
    
    // 確認画面（簡易）
    public function light_confirm(Request $request, $display_url, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'gender' => 'required|string',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'mail' => 'required|email',
            'tel' => 'required|numeric',
            'zip' => 'required|numeric',
            'address' => 'required|string',
            'carreer' => 'nullable|string',
            'qualification' => 'nullable|string',
            'myself' => 'nullable|string',
        ]);

        // 画面にデータを表示する(ただのビューの表示なので createと同じ仕組み）)
        $user = User::where('display_url', $display_url)->first();

        if (is_null($user)) {
            abort('404');

        } else {
            $job = $user->jobs()->find($id);
            if (is_null($job)) {
                abort('404');
            }
        };

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
        $entry->myself = $request->myself;

        return view('home.light_entry_confirm', [
            'user' => $user,
            'job' => $job,
            'entry' => $entry,
        ]);
    }

    //エントリーフォーム
    public function create($display_url, $id)
    {
        $user = User::where('display_url', $display_url)->first();
        if (is_null($user)) {
            abort('404');

        } else {
            $job = $user->jobs()->find($id);
            if (is_null($job)) {
                abort('404');
            }
        };
        
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
            'gender' => 'required|string',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'mail' => 'required|email',
            'tel' => 'required|numeric',
            'zip' => 'required|numeric',
            'address' => 'required|string',
            'carreer' => 'nullable|string',
            'qualification' => 'nullable|string',
            'myself' => 'required|string',
        ]);

        // 画面にデータを表示する(ただのビューの表示なので createと同じ仕組み）)
        $user = User::where('display_url', $display_url)->first();
        if (is_null($user)) {
            abort('404');

        } else {
            $job = $user->jobs()->find($id);
            if (is_null($job)) {
                abort('404');
            }
        };

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
        if (is_null($user)) {
            abort('404');

        } else {
            $job = $user->jobs()->find($id);
            $recruiter_id = $job->recruiter;
            $recruiter = $user->recruiters()->where('id', $recruiter_id)->first();
            
            if(!is_null($recruiter_id)) {
                $send_mail = $recruiter->email;
                $signature_name = $recruiter->name;
                $signature_tel = $recruiter->tel;
                $signature_address = $recruiter->address;
            } else {
                $send_mail = $user->email;
                $signature_name = $user->name;
                $signature_tel = $user->tel;
                $signature_address = $user->address;
            }

            if (is_null($job)) {
                abort('404');
            }
        };
        
        $input = $request->except('action');
        if ($request->action === '戻る') {
        return redirect()
            ->route('entry.get', ['display_url' => $user->display_url, 'id' => $job->id])
            ->withInput($input);
        }
        
        $input = $request->except('light_action');
        if ($request->light_action === '戻る') {
        return redirect()
            ->route('light.get', ['display_url' => $user->display_url, 'id' => $job->id])
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
        
        // 送信メール(自動返信)
        \Mail::send(new \App\Mail\EntryMail([
            'to' => $request->mail,
            'to_name' => $request->name,
            'from' => 'sender@feedjob.net',
            'from_name' => $user->company,
            'subject' => 'ご応募ありがとうございました',
            'signature_name' => $signature_name,
            'signature_mail' => $send_mail,
            'signature_tel' => $signature_tel,
            'signature_address' => $signature_address,
        ]));

        // 受信メール(データ受信)
        \Mail::send(new \App\Mail\EntryMail([
            'to' => $send_mail,
            'to_name' => $user->company,
            'from' => 'sender@feedjob.net',
            'from_name' => $request->name,
            'subject' => '採用サイトからの応募を受付けました',
            'gender' => $request->gender,
            'from_mail' => $request->mail,
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
