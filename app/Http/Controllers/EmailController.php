<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;

class EmailController extends Controller
{
    public function write(){
        return view('email.write_email');
    }

    public function send(Request $request){
        $email = $request->email;
        $asunto = $request->asunto;
        $mensaje = $request->mensaje;

        $data = [
            'email' => $email,
            'subject' =>  $asunto,
            'body' => $mensaje
        ];

        SendEmail::dispatch($data);

        return back();
    }
}
