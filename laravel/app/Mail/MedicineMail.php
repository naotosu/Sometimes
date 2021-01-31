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
    public function __construct($user_name, $medicine)
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
        return $this->view('emails.notification_mail')
                        ->subject('お薬の時間です')
                        ->with([
                            'user_name' => $this->user_name,
                            'medicine' => $this->medicine,
                        ]);
    }
}
