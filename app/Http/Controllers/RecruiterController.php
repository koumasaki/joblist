<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Recruiter;

class RecruiterController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $recruiters = $user->recruiters()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'recruiters' => $recruiters,
            ];
            $data += $this->counts($user);
            return view('users.recruiter_index', $data);
        }else {
            return view('welcome');
        }
    }

    public function create()
    {
        $recruiter = new Recruiter;
        
        return view('users.recruiter_create', [
            'recruiter' => $recruiter,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'zip' => 'required',
            'address' => 'required',
            'tel' => 'required',
        ]);
        
        $recruiter = new Recruiter;
        $recruiter->user_id = \Auth::user()->id;
        $recruiter->section = $request->section;
        $recruiter->name = $request->name;
        $recruiter->zip = $request->zip;
        $recruiter->address = $request->address;
        $recruiter->tel = $request->tel;
        $recruiter->email = $request->email;
        $recruiter->save();
        
        return redirect('/user/recruiter');
    }

    public function edit($id)
    {
        $recruiter = Recruiter::find($id);
        if (is_null($recruiter) || \Auth::id() !== $recruiter->user_id) {
            abort('404');

        } else {
            return view('users.recruiter_edit', [
                'recruiter' => $recruiter,
            ]);
        };
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'zip' => 'required',
            'address' => 'required',
            'tel' => 'required',
        ]);
        
        $recruiter = Recruiter::find($id);
        $recruiter->section = $request->section;
        $recruiter->name = $request->name;
        $recruiter->zip = $request->zip;
        $recruiter->address = $request->address;
        $recruiter->tel = $request->tel;
        $recruiter->email = $request->email;
        $recruiter->save();
        
        return redirect('/user/recruiter');
    }

    public function destroy($id)
    {
        $recruiter = \App\Recruiter::find($id);

        if (\Auth::id() === $recruiter->user_id) {
            $recruiter->delete();
        }

        return redirect('/user/recruiter');
    }
}
