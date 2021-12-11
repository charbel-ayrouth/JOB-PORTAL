<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobInterest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $job_provider;
    private $job_seeker;
    
    public function __construct($job_provider,$Job_seeker)
    {
        $this->job_provider = $job_provider;
        $this->job_seeker = $Job_seeker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'JACPortal')->markdown('mail.JobInterest-mail')->with('job_seeker',$this->job_seeker)->with('job_provider',$this->job_provider);

    }
}
