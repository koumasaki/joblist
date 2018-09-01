<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EntryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // 引数で受け取ったデータ用の変数
    protected $entry;
    protected $viewStr;

    public function __construct($entry, $viewStr= 'to')
    {
        $this->entry = $entry;
        $this->viewStr = $viewStr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('entry_mails.'.$this->viewStr)
            ->to($this->entry['to'], $this->entry['to_name'])
            ->from($this->entry['from'], $this->entry['from_name'])
            ->subject($this->entry['subject'])
            ->with([
                'entry' => $this->entry,
            ]);
    }
}
