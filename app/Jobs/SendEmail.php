<?php

namespace App\Jobs;

use App\Mail\TicketsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Register_ticket;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $email;


    public function __construct( $receiverAddress  )
    {
        //
        $this->email = $receiverAddress;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new TicketsMail($this->email);
        Mail::to($this->email)->queue($email);
    }
}
