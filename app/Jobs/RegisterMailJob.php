<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
class RegisterMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $userName;
    public $userMail;
    public function __construct($userMail, $userName)
    {
        $this->userName = $userName;
        $this->userMail = $userMail;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->userMail)->send(new RegisterMail($this->userName));
        } catch (\Throwable $th) {
          dd($th);
        }
    }
}
