<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
Use Mail;
use App\Mail\MailNotify;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        try {
            Mail::to($this->data['email'])->send(new MailNotify($this->data));
        } catch (\Exception $exception){
            Log::error("error to send email $exception");
        }
    }
}
