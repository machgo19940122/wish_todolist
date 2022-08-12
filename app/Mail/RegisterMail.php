<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_name,$new_email,$new_password,$new_id)
    {
        $this->new_name=$new_name;
        $this->new_email=$new_email;
        $this->new_id=$new_id;
        $this->new_password=$new_password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this ->to($this->new_email)//送信先
        ->subject('登録完了しました')//件名
        ->view('registers.register_mail')//本文
        ->with(['new_name'=>$this->new_name,'new_password'=>$this->new_password,
                'new_id'=>$this->new_id,'new_email'=>$this->new_email]);//送る値
     
    }
}
