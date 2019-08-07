<?php

namespace App\Http\Controllers;

use App\EventParticipation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EventParticipationController extends Controller
{

    protected $rules=[
        'firstname' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'jobtitle' => ['required', 'string', 'max:255'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Event $event)
    {
        return view('eventparticipant.add',['event'=>$event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,\App\Event $event)
    {
        $this->validate($request,$this->rules);
        $user = \App\User::where('email',$request->email)->get()->first();
        if(count($user)>0)
        {
            EventParticipation::create([
                'user_id'=>$user->id,
                'event_id' =>$event->id,
                'status' => EventParticipation::EVENT_PARTICIPATION_STATUS_ACTIVE
            ]);
            return redirect(route('showevent',['event'=>$event]))->with('success','user is addedto eventparticipant');
            //$user->roles()->syncWithoutDetaching([4,5]);
        }else{
            $user = \App\User::create([
                'email' => $request->email,
                'password' => Hash::make(\App\User::DEFAULT_PASSWORD),
            ]);

            $user->roles()->syncWithoutDetaching([4,5]);

            $person = new \App\Person;
            $person->firstname = $request->firstname;
            $person->lastname = $request->lastname;
            $person->jobtitle = $request->jobtitle;
            $person->user = $user->id;
            $person->save();

            EventParticipation::create([
                'user_id'=>$user->id,
                'event_id' =>$event->id,
                'status' => EventParticipation::EVENT_PARTICIPATION_STATUS_INACTIVE
            ]);
            return redirect(route('showevent',['event'=>$event]))->with('success','user is added, added to eventparticipant');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventParticipation  $eventparticipation
     * @return \Illuminate\Http\Response
     */
    public function sendWelcomeNotification(EventParticipation $eventparticipation)
    {

        // call our event here
        event(new \App\Events\SendEmail($eventparticipation,'emails.sendwelcomenotification'));
        $event = $eventparticipation->event;

        $responseBody = view('event.ajax',['event'=>$event])->render();
        
        return response()->json(['success'=>'Got Simple Ajax Request.','responseBody'=>$responseBody]);
        //return redirect()->route('showevent', ['event'=>$event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventParticipation  $eventparticipation
     * @return \Illuminate\Http\Response
     */
    public function sendActivationReminder(EventParticipation $eventparticipation)
    {

        event(new \App\Events\SendEmail($eventparticipation,'emails.sendactivationreminder'));
        $event = $eventparticipation->event;

        return redirect()->route('showevent', ['event'=>$event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function activateUser(\App\User $user)
    {

        if(!$user->hasVerifiedEmail()){
            $user->email_verified_at = new \DateTime();
            $user->save();
        }
        return redirect('/')->with('success', 'You are successfuly activated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventParticipation $participation
     * @return \Illuminate\Http\Response
     */
    public function activateUserPartcipation(\App\EventParticipation $participation)
    {
        $participation->status = EventParticipation::EVENT_PARTICIPATION_STATUS_ACTIVE;
        $participation->save();

        return redirect('/')->with('success', 'You are successfuly participateeed in event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventParticipation  $eventParticipation
     * @return \Illuminate\Http\Response
     */
    public function show(EventParticipation $eventParticipation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventParticipation  $eventParticipation
     * @return \Illuminate\Http\Response
     */
    public function edit(EventParticipation $eventParticipation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventParticipation  $eventParticipation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventParticipation $eventParticipation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventParticipation  $eventParticipation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventParticipation $eventParticipation)
    {
        //
    }
}
