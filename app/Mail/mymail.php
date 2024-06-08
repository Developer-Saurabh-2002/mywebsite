<?php
//php artisan make:mail [name]    -----Run this Command in terminal to create this page 


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mymail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $subject;
    public $view;

    public function __construct($details, $subject, $view)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->view = $view;
    }

    public function build()
    {
        return $this->subject($this->subject)->view($this->view);
    }
}

