<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\EventParticipation $eventparticipation
     */
    public $eventparticipation;

    /**
     * The order instance.
     *
     * @var string $template
     */
    public $template;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\EventParticipation $eventparticipation,$template)
    {
        $this->eventparticipation = $eventparticipation;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bharat.parmar@ia.ooo')->view($this->template);
        //return $this->from('bharat.parmar@ia.ooo')->markdown('emails.sendactivationreminder'));
    }
}
