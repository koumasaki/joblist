<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Job;

class HomeController extends Controller
{
    //個別ユーザー登録情報
    public function company($id)
    {
        $user = User::where('display_url', $id)->first();
        $jobs = $user->jobs()->where('release', 'release')->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'jobs' => $jobs,
        ];
        $data += $this->counts($user);
        return view('home.user_detail', $data);
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
        $user = User::where('display_url', $display_url)->first();
        $job = $user->jobs()->find($id);

        return view('home.user_job', [
            'user' => $user,
            'job' => $job,
        ]);
    }
}
