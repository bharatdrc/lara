<?php

namespace App\Http\Controllers;

use App\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    
    protected $rules = [
        'startdate'=>['required', 'date','after:now'],
        'starttime'=>['required','after:+1 hour'],
        'duration' =>['required', 'integer','min:10'],
        'break' =>['required', 'integer','min:5'],
        'slots' =>['required', 'integer','min:1']
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
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Event $event)
    {
        return view('timeslot.add',compact('event'));
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
        $timeSegments = explode(':', $request->starttime);
        $date = date_parse($request->startdate);
        
        $timestamp = mktime($timeSegments[0], $timeSegments[1], 0, $date['month'], $date['day'], $date['year']);
        $nextStart = $timestamp;
        for($i = 1; $i <= $request->slots; $i++) {
                $timeslot = new Timeslot;
                $timeslotStart = new \DateTime();

                $timeslotStart = $timeslotStart->setTimestamp($nextStart);

                $timeslot->starttime = $timeslotStart;

                $end = $nextStart + ($request->duration * 60);
                $timeslotEnd = new \DateTime();
                $timeslotEnd = $timeslotEnd->setTimestamp($end);
                $timeslot->endtime = $timeslotEnd;

                $nextStart = $end + ($request->break * 60);
//dd($timeslot);
                $timeslot->save();
                $timeslot->event()->associate($event)->save();
            }

            return redirect('eventlist')->with('success','timeslot created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function show(Timeslot $timeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeslot $timeslot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timeslot $timeslot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeslot $timeslot)
    {
        //
    }
}
