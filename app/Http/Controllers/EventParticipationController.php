<?php

namespace App\Http\Controllers;

use App\EventParticipation;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules);
        $user = \App\User::where('email',$request->email)->get();
        if(count($user)>0)
        {
            $user->roles()->syncWithoutDetaching([4,5]);
        }
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
