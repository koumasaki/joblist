<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Entry;
use App\Sendmail;
use App\Recruiter;

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
            $recruiters = $user->recruiters()->get();
    
            $sendmail = new Sendmail;
            return view('users.mail_create', [
                'user' => $user,
                'sendmail' => $sendmail,
                'entry' => $entry,
                'mailtemplates' => $mailtemplates,
                'recruiters' => $recruiters,
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
            $recruiters = $user->recruiters()->get();
            
            return view('users.mail_create', [
                'user' => $user,
                'entry' => $entry,
                'mailtemplates' => $mailtemplates,
                'template' => $template,
                'recruiters' => $recruiters,
            ]);
        };
    }
    //メールテンプレート読み込み
    public function read_template(Request $request, $id)
    {
        $user = \Auth::user();
        $entry = $user->entries()->find($id);

        if (is_null($entry) or \Auth::id() !== $entry->user_id) {
            abort('404');

        } else {
            
            $mailtemplates = $user->mailtemplates()->get();
            $template = $user->mailtemplates()->find($request->template_id);
            $zip = substr($entry->zip,0,3) . "-" . substr($entry->zip,3);
            $sendmails = $user->sendmails()->where('entry_id', $id)->orderBy('created_at', 'desc')->paginate(20);
            $recruiters = $user->recruiters()->get();
            
            return view('users.entry_detail', [
                'user' => $user,
                'entry' => $entry,
                'mailtemplates' => $mailtemplates,
                'template' => $template,
                'zip' => $zip,
                'sendmails' => $sendmails,
                'recruiters' => $recruiters,
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
        $sendmail->sender = $request->sender;
        $sendmail->save();
        
        $sender_id = $sendmail->sender;
        $sender = $user->recruiters()->where('id', $sender_id)->first();
        
        if(!is_null($sender_id)) {
            $signature_name = $sender->name;
            $signature_mail = $sender->email;
            $signature_tel = $sender->tel;
            $signature_address = $sender->address;
        } else {
            $signature_name = $user->name;
            $signature_mail = $user->email;
            $signature_tel = $user->tel;
            $signature_address = $user->address;
        }
        

        // 送信メール(自動返信)
        \Mail::send(new \App\Mail\SendMail([
            'to' => $request->to_mail,
            'to_name' => $request->to_name,
            'from' => 'sender@feedjob.net',
            'from_name' => $user->company,
            'subject' => $request->title,
            'body' => $request->body,
            'signature_name' => $signature_name,
            'signature_mail' => $signature_mail,
            'signature_tel' => $signature_tel,
            'signature_address' => $signature_address,
        ]));
     
        // 受信メール(送信通知)
        \Mail::send(new \App\Mail\SendMail([
            'to' => $signature_mail,
            'to_name' => $user->company,
            'from' => 'sender@feedjob.net',
            'from_name' => $request->to_name,
            'subject' => '【送信済】' . $request->title,
            'body' => $request->body,
            'signature_name' => $signature_name,
            'to_mail' => $request->to_mail,
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
