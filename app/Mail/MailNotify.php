<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public array $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(){
        $this->from('ponsianodeloor@gmail.com', 'Ponsiano De Loor')
            ->subject($this->data['subject'])
            ->view('email.send')->with('data', $this->data);
    }
}
