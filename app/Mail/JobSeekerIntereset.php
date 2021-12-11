<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobSeekerIntereset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $job_seeker;
    private $job_provider;

    public function __construct($job_provider,$job_seeker)
    {
        $this->job_provider = $job_provider;
        $this->job_seeker = $job_seeker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'JACPortal')->markdown('mail.JobSeekerInterset-mail')->with('job_seeker',$this->job_seeker)->with('job_provider',$this->job_provider);
    }
}
