<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Event;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendWelcomeMail {event} {--Q|queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send welcome message to event participant';

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
     * @return mixed
     */
    public function handle()
    {
        $eventId = $this->argument('event');
        $queueName = $this->option('queue');
        $event = Event::find($eventId);
        $partcipants = $event->participants;
        $users = [];
        foreach ($partcipants as $partcipant) {
        	//if($partcipant->status==0){
        		event(new \App\Events\SendEmail($partcipant,'emails.sendwelcomenotification'));
        	//}
        }
        $this->info('wellcome mail sent for event : '.$eventId);
    }
}
