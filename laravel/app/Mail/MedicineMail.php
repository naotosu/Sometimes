<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MedicineMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_name = $user_name;
        $this->medicine = $medicine;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //TODO Laravel8でのviewへの参照を調査して修正する
        return $this->view(''emails.notification_mail'');
                        ->subject('お薬の時間です')　
                        ->with([
                            'user_name' => $this->user_name,
                            'medicine' => $this->medicine,
                        ]);
    }
}
