<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use Image;

class JobsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $jobs = $user->jobs()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'jobs' => $jobs,
            ];
            $data += $this->counts($user);
            return view('users.job_index', $data);
        }else {
            return view('welcome');
        }
    }
    //募集要項新規登録
    public function create()
    {
        $job = new Job;
        return view('users.job_create', [
            'job' => $job,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_name' => 'required|max:191',
            'job_status' => 'required|max:191',
            'detail' => 'required|max:191',
            'qualification' => 'required|max:191',
            'release' => 'required',
        ]);

        $job = new Job;
        $job->job_name = $request->job_name;
        $job->user_id = \Auth::user()->id;
        $job->job_status = $request->job_status;
        $job->job_copy = $request->job_copy;
        $job->detail = $request->detail;
        $job->qualification = $request->qualification;
        $job->salary = $request->salary;
        $job->allowance = $request->allowance;
        $job->place = $request->place;
        $job->time = $request->time;
        $job->holiday = $request->holiday;
        $job->bonus = $request->bonus;
        $job->benefit = $request->benefit;
        $job->add_title = $request->add_title;
        $job->add_body = $request->add_body;
        $job->entry_method = $request->entry_method;
        $job->job_category = $request->job_category;
        $job->pref = $request->pref;
        $job->release = $request->release;
        $job->sender_mail = $request->sender_mail;

        //仕事画像
        if($request->hasFile('job_image')) {
            $image = $request->file('job_image');
            $filename = \Auth::user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/job_image/'. $filename);
            Image::make($image)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();})->save($location);
            
            $job->job_image = $filename;
        }
        
        $job->save();

        return redirect('/user/jobs');
    }
    
    //募集要項編集フォーム
    public function edit($id)
    {
        $job = Job::find($id);

        return view('users.job_edit', [
            'job' => $job,
        ]);
    }

    //募集要項編集登録
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_status' => 'required|max:191',
            'detail' => 'required|max:191',
            'qualification' => 'required|max:191',
            'release' => 'required',
        ]);

        $job = Job::find($id);
        $job->job_status = $request->job_status;
        $job->job_copy = $request->job_copy;
        $job->detail = $request->detail;
        $job->qualification = $request->qualification;
        $job->salary = $request->salary;
        $job->allowance = $request->allowance;
        $job->place = $request->place;
        $job->time = $request->time;
        $job->holiday = $request->holiday;
        $job->bonus = $request->bonus;
        $job->benefit = $request->benefit;
        $job->add_title = $request->add_title;
        $job->add_body = $request->add_body;
        $job->entry_method = $request->entry_method;
        $job->job_category = $request->job_category;
        $job->pref = $request->pref;
        $job->release = $request->release;
        $job->sender_mail = $request->sender_mail;

        //仕事画像
        if($request->hasFile('job_image')) {
            $image = $request->file('job_image');
            $filename = \Auth::user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/job_image/'. $filename);
            Image::make($image)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();})->save($location);
            
            $job->job_image = $filename;
        }
        
        $job->save();

        return redirect('/user/jobs');
    }

    //募集要項複製
    public function getCopy($id){

        $data = \App\Job::find($id)->replicate();
        $data->job_name = '（複製）'. $data->job_name;
        $data->release = 'unrelease';
        unset($data->created_at);
        unset($data->updated_at);
        if($data->save()){
            return redirect('/user/jobs')
                            ->with('message', '複製しました。');
        }else{
            return redirect('/user/jobs')
                            ->with('message', '複製出来ませんでした。');
        }
    }

    //募集要項削除
    public function destroy($id)
    {
        $job = \App\Job::find($id);

        if (\Auth::id() === $job->user_id) {
            $job->delete();
        }

        return redirect('/user/jobs');
    }
}