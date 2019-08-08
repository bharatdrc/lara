<?php

namespace App\Listeners;

use App\Events\SendEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistration;

class SendActivationReminder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendEmail  $event
     * @return void
     */
    public function handle(SendEmail $event)
    {

        /*if ($event->eventparticipation->user instanceof MustVerifyEmail && ! $event->eventparticipation->user->hasVerifiedEmail()) {
            $event->eventparticipation->user->sendEmailVerificationNotification();
        }*/
        $eventparticipation = $event->eventparticipation;
        Mail::to($eventparticipation->user->email)->send(new UserRegistration($eventparticipation,$event->template));



        /*$data = ['user'=>$eventparticipation->user,'event'=>$eventparticipation->event]

        Mail::to($eventparticipation->user->email)->send(new OrderShipped($order));
        Mail::send('emails.sendactivationreminder', $data, function($message) use ($data) {
            $message->to($eventparticipation->user->email)
                    ->subject('Activation mail');
            $message->from('bharat.parmar@ia.ooo');
        });*/
    }
}
