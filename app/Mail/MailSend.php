<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $viewName;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $_viewName, array $_data)
    {
        //
        $this->viewName = $_viewName;
        $this->data = $_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data['subject'])
                    ->text($this->viewName)
                    ->with($this->data);
    }
}
