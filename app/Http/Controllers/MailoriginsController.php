<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin;
use App\Mailorigin;

class MailoriginsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //登録一覧
    public function index()
    {
        $mails = Mailorigin::all();

        return view('admin.mails', [
            'mails' => $mails,
        ]);
    }

    //新規登録フォーム
    public function create()
    {
        $mail = new Mailorigin;
        
        return view('admin.mail_create', [
            'mail' => $mail,
        ]);
    }

    //新規登録保存
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        
        $mail = new Mailorigin;
        $mail->title = $request->title;
        $mail->body = $request->body;
        $mail->save();
        
        return redirect('/admin/mails');
    }

    //編集フォーム
    public function edit($id)
    {
        $mail = Mailorigin::find($id);
        if (is_null($mail)) {
            abort('404');

        } else {
            return view('admin.mail_edit', [
                'mail' => $mail,
            ]);
        };
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        
        $mail = Mailorigin::find($id);
        $mail->title = $request->title;
        $mail->body = $request->body;
        $mail->save();
        
        return redirect('/admin/mails');
    }

    public function destroy($id)
    {
        $mail = Mailorigin::find($id);
        $mail->delete();

        return redirect('/admin/mails');
    }
}
