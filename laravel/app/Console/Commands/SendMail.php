<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Sometime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MedicineMail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $now = \Carbon\Carbon::now();

        //テスト用
        $now = '2021-01-31 20:00:00';
        
        $sometimes = sometime::SearchBySometimeThis($now)->get();
        $users = \DB::table('users')->get();

        foreach ($sometimes as $sometime) {

            foreach ($users as $user) {
                if ( $sometime->user_id == $user->id) {
                    $mail_to = $user->email;
                    $user_name = $user->name;
                }
            }

            $medicine = $sometime->medicine;
            Mail::to($mail_to)->send( new MedicineMail($user_name, $medicine) );

        }
    }
}
