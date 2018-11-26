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
            abort('404');
        }
    }

    //募集要項絞り込み検索
    public function search_result(Request $request)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

            $job_name = $request->job_name;
            $pref = $request->pref;
            $status = $request->status;
            $release = $request->release;

            $jobs = $user->jobs()->where('job_name', 'LIKE', '%'.$job_name.'%');
            
            if (!is_null($pref)) {
                $jobs = $jobs->where('pref', $pref);
            }
            if (!is_null($status)) {
                $jobs = $jobs->where('job_status', $status);
            }
            if (!is_null($release)) {
                $jobs = $jobs->where('release', $release);
            }
            
            $jobs = $jobs->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'jobs' => $jobs,
                'job_name' => $job_name,
                'pref' => $pref,
                'status' => $status,
                'release' => $release,
            ];
            $data += $this->counts($user);
            return view('users.job_search', $data);
        }else {
            abort('404');
        }
    }
    //募集要項新規登録
    public function create()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $job = new Job;
            $recruiters = $user->recruiters()->get();
            
            return view('users.job_create', [
                'user' => $user,
                'job' => $job,
                'recruiters' => $recruiters,
            ]);
        }else {
            abort('404');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_name' => 'required|string',
            'job_status' => 'required',
            'job_copy' => 'required|string',
            'detail' => 'required|string',
            'qualification' => 'required|string',
            'simple_salary' => 'required|string',
            'place' => 'required|string',
            'time' => 'required|string',
            'holiday' => 'nullable|string',
            'bonus' => 'nullable|string',
            'benefit' => 'nullable|string',
            'add_title' => 'nullable|string',
            'add_body' => 'nullable|string',
            'job_image' => 'file|image|dimensions:min_width=400',
            'entry_method' => 'required|string',
            'simple_form' => 'required',
            'job_category' => 'required',
            'zip' => 'required|numeric',
            'pref' => 'required|string',
            'state' => 'required|string',
            'address' => 'nullable|string',
            'station' => 'nullable|string',
            'salary_type' => 'required',
            'salary_low' => 'required|numeric',
            'salary_high' => 'nullable|numeric',
            'education' => 'nullable|string',
            'original_category' => 'nullable|string',
            'release' => 'required',
            'memo' => 'nullable|string',
        ]);

        $job = new Job;
        $job->job_name = $request->job_name;
        $job->user_id = \Auth::user()->id;
        $job->job_status = $request->job_status;
        $job->job_copy = $request->job_copy;
        $job->detail = $request->detail;
        $job->qualification = $request->qualification;
        $job->simple_salary = $request->simple_salary;
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
        $job->simple_form = $request->simple_form;
        $job->job_category = $request->job_category;
        $job->zip = $request->zip;
        $job->pref = $request->pref;
        $job->state = $request->state;
        $job->address = $request->address;
        $job->station = $request->station;
        $job->salary_type = $request->salary_type;
        $job->salary_low = $request->salary_low;
        $job->salary_high = $request->salary_high;
        $job->education = $request->education;
        $job->original_category = $request->original_category;
        $job->release = $request->release;
        $job->recruiter = $request->recruiter;
        $job->memo = $request->memo;

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
        if (\Auth::check()) {
            $user = \Auth::user();
            $job = Job::find($id);
            if (is_null($job) or \Auth::id() !== $job->user_id) {
                abort('404');
            } else {
                $recruiters = $user->recruiters()->get();
                $rec_id = $job->recruiter;
                $recruiter = $user->recruiters()->where('id', $rec_id)->first();
                return view('users.job_edit', [
                    'user' => $user,
                    'job' => $job,
                    'recruiters' => $recruiters,
                    'recruiter' => $recruiter,
                    'rec_id' => $rec_id,
                ]);
            };
        }else {
            abort('404');
        }
    }

    //募集要項編集登録
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_name' => 'required|string',
            'job_status' => 'required',
            'job_copy' => 'required|string',
            'detail' => 'required|string',
            'qualification' => 'required|string',
            'simple_salary' => 'required|string',
            'place' => 'required|string',
            'time' => 'required|string',
            'holiday' => 'nullable|string',
            'bonus' => 'nullable|string',
            'benefit' => 'nullable|string',
            'add_title' => 'nullable|string',
            'add_body' => 'nullable|string',
            'entry_method' => 'required|string',
            'simple_form' => 'required',
            'job_category' => 'required',
            'zip' => 'required|numeric',
            'pref' => 'required|string',
            'state' => 'required|string',
            'address' => 'nullable|string',
            'station' => 'nullable|string',
            'salary_type' => 'required',
            'salary_low' => 'required|numeric',
            'salary_high' => 'nullable|numeric',
            'education' => 'nullable|string',
            'original_category' => 'nullable|string',
            'release' => 'required',
            'memo' => 'nullable|string',
        ]);
        if( $request->job_name === null) {
            $this->validate($request, [
                'job_image' => 'nullable',  
            ]);
        } else {
            $this->validate($request, [
                'job_image' => 'file|image|dimensions:min_width=400',  
            ]); 
        }

        $job = Job::find($id);
        $job->job_name = $request->job_name;
        $job->job_status = $request->job_status;
        $job->job_copy = $request->job_copy;
        $job->detail = $request->detail;
        $job->qualification = $request->qualification;
        $job->simple_salary = $request->simple_salary;
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
        $job->simple_form = $request->simple_form;
        $job->job_category = $request->job_category;
        $job->zip = $request->zip;
        $job->pref = $request->pref;
        $job->state = $request->state;
        $job->address = $request->address;
        $job->station = $request->station;
        $job->salary_type = $request->salary_type;
        $job->salary_low = $request->salary_low;
        $job->salary_high = $request->salary_high;
        $job->education = $request->education;
        $job->original_category = $request->original_category;
        $job->release = $request->release;
        $job->recruiter = $request->recruiter;
        $job->memo = $request->memo;

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

        return redirect('/user/jobs')
            ->with('message', '求人案件を編集しました。');
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