<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Entry;
use App\Sendmail;

class SendMailsController extends Controller
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
            $sendmails = $user->sendmails()->orderBy('created_at', 'desc')->paginate(20);

            $data = [
                'user' => $user,
                'sendmails' => $sendmails,
            ];
            $data += $this->counts($user);
            return view('users.mail_index', $data);
        }else {
            abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = \Auth::user();
        $entry = $user->entries()->find($id);

        if (is_null($entry) or \Auth::id() !== $entry->user_id) {
            abort('404');

        } else {
            $mailtemplates = $user->mailtemplates()->get();
    
            $sendmail = new Sendmail;
            return view('users.mail_create', [
                'sendmail' => $sendmail,
                'entry' => $entry,
                'mailtemplates' => $mailtemplates,
            ]);
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //メールテンプレート読み込み
    public function read(Request $request, $id)
    {
        $user = \Auth::user();
        $entry = $user->entries()->find($id);

        if (is_null($entry) or \Auth::id() !== $entry->user_id) {
            abort('404');

        } else {
            
            $mailtemplates = $user->mailtemplates()->get();
            $template = $user->mailtemplates()->find($request->template_id);
            
            return view('users.mail_create', [
                'entry' => $entry,
                'mailtemplates' => $mailtemplates,
                'template' => $template,
            ]);
        };
    }
    
    //入力内容保存
    public function store(Request $request, $id)
    {
        $user = \Auth::user();
        $entry = $user->entries()->find($id);
        $mailtemplates = $user->mailtemplates()->get();
        
        $sendmail = new Sendmail;
        $sendmail->user_id = \Auth::user()->id;
        $sendmail->entry_id = $request->entry_id;
        $sendmail->to_name = $request->to_name;
        $sendmail->to_mail = $request->to_mail;
        $sendmail->title = $request->title;
        $sendmail->body = $request->body;
        $sendmail->save();

        // 送信メール
        \Mail::send(new \App\Mail\SendMail([
            'to' => $request->to_mail,
            'to_name' => $request->to_name,
            'from' => $user->email,
            'from_name' => $user->company,
            'subject' => $request->title,
            'body' => $request->body,
        ]));
     
        // 受信メール
        \Mail::send(new \App\Mail\SendMail([
            'to' => $user->email,
            'to_name' => $user->company,
            'from' => $request->to_mail,
            'from_name' => $request->to_name,
            'subject' => '【送信済】' . $request->title,
            'body' => $request->body,
        ], 'from'));

        // 二重送信防止
        $request->session()->regenerateToken();
        
        return redirect('/user/mails')->with('message', 'メールを送信しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
