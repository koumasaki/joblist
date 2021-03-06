<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Mailtemplate;
use App\Mailorigin;

class MailtemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $mailtemplates = $user->mailtemplates()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'mailtemplates' => $mailtemplates,
            ];
            $data += $this->counts($user);
            return view('users.mailtemplate_index', $data);
        }else {
            return view('403');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mailtemplate = new Mailtemplate;
        $mailorigins = Mailorigin::get();
        
        return view('users.mailtemplate_create', [
            'mailtemplate' => $mailtemplate,
            'mailorigins' => $mailorigins,
        ]);
    }

    public function read(Request $request)
    {
        $mailtemplate = new Mailtemplate;
        $mailorigins = Mailorigin::get();
        $mailorigin = Mailorigin::find($request->mail_id);
        $mail_title = $mailorigin->title;
        $mail_body = $mailorigin->body;

        return view('users.mailtemplate_read', [
            'mailtemplate' => $mailtemplate,
            'mailorigins' => $mailorigins,
            'mailorigin' => $mailorigin,
            'mail_title' => $mail_title,
            'mail_body' => $mail_body,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        
        $mailtemplate = new Mailtemplate;
        $mailtemplate->user_id = \Auth::user()->id;
        $mailtemplate->title = $request->title;
        $mailtemplate->body = $request->body;
        $mailtemplate->save();
        
        return redirect('/user/mailtemplates');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mailtemplate = Mailtemplate::find($id);
        if (is_null($mailtemplate) or \Auth::id() !== $mailtemplate->user_id) {
            abort('404');

        } else {
            return view('users.mailtemplate_edit', [
                'mailtemplate' => $mailtemplate,
            ]);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        
        $mailtemplate = Mailtemplate::find($id);
        $mailtemplate->title = $request->title;
        $mailtemplate->body = $request->body;
        $mailtemplate->save();
        
        return redirect('/user/mailtemplates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mailtemplate = \App\Mailtemplate::find($id);

        if (\Auth::id() === $mailtemplate->user_id) {
            $mailtemplate->delete();
        }

        return redirect('/user/mailtemplates');
    }
}
