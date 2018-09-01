<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // 引数で受け取ったデータ用の変数
    protected $sendmail;
    protected $viewStr;
    
    public function __construct($sendmail, $viewStr= 'to')
    {
        $this->sendmail = $sendmail;
        $this->viewStr = $viewStr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('send_mails.'.$this->viewStr)
            ->to($this->sendmail['to'], $this->sendmail['to_name'])
            ->from($this->sendmail['from'], $this->sendmail['from_name'])
            ->subject($this->sendmail['subject'])
            ->with([
                'sendmail' => $this->sendmail,
            ]);
    }
}
