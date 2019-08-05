<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    protected $rules = [
        'name' => ['required', 'string', 'max:255','unique:locations'],
        'decription' => ['required', 'string', 'max:255'],
        'type' => ['required', 'integer'],
        'attendee' => ['required', 'integer'],
        'timeslots' => ['required', 'array','min:1'],
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
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Event $event)
    {
        return view('location.add',compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,\App\Event $event)
    {
        $this->validate($request,$this->rules);
        $location = Location::create([
            'name' => $request->name,
            'description' => $request->decription,
            'type' => $request->type,
            'attendee' => $request->attendee,
            'event_id' => $event->id
        ]);

        $location->timeslots()->detach();

        foreach ($request->timeslots as $timeslot) {
            $location->timeslots()->attach($timeslot);
        }

        return back()->with('success','location created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $selectedTimeslots = $location->timeslots->pluck('id')->all();
        return view('location.edit',['location'=>$location,'selectedTimeslots'=>$selectedTimeslots]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        if($request->isMethod('patch')){
            $this->rules['name'] = 'required|string|max:255|unique:locations,id,'.$location->id;
        }
        $this->validate($request,$this->rules);
        $location->update([
            'name' => $request->name,
            'description' => $request->decription,
            'type' => $request->type,
            'attendee' => $request->attendee,
        ]);

        $location->timeslots()->detach();

        foreach ($request->timeslots as $timeslot) {
            $location->timeslots()->attach($timeslot);
        }

        return back()->with('success','location updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
