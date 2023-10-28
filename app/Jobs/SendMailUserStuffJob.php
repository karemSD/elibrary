<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\sendMailUserStuff;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailUserStuffJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
   private $users;
    public function __construct($users)
    {
        $this->users=$users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { $users=$this->users;
        foreach ($users as $user) {
            Mail::to($user->email)->send(new sendMailUserStuff($user->first_name) );
        }

    }
}
