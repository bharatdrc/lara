<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $rules =  [
        'company' => ['required', 'integer'],
        'eventname' => ['required', 'string', 'max:255','unique:events'],
        'shortname' => ['required', 'string', 'max:255'],
        'subtitle' => ['required', 'string', 'max:255'],
        'url' => ['required', 'string', 'url'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'titleimage' => ['required', 'image', 'mimes:jpeg,jpg,png'],
        'logo' => ['required', 'image', 'mimes:jpeg,jpg,png'],
        'language' => ['required','integer'],
        'description' => ['required', 'string'],
        'customcss' => ['required', 'string'],
        'package' => ['required', 'integer'],
        'addone.*' => ['required', 'integer'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.list',['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = \App\Company::all();
        $packages = \App\Package::where(['type'=>1])->get();

        $attendeeAddons = \App\Package::where(['type'=>2,'totalattendee'=>0])->get();
        $slotAddons = \App\Package::where(['type'=>2,'totalslot'=>0])->get();
        return view('event.add',['companies' => $companies,'packages'=>$packages,'attendeeAddons'=>$attendeeAddons,'slotAddons'=>$slotAddons]);
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
        if(isset($request->titleimage)){
            $titleImageName = $request->titleimage;
        }
        if(isset($request->logo)){
            $logoName = $request->logo;
        }

        if ($request->hasFile('titleimage') && $request->file('titleimage')->isValid()) {
            $titleImageName = $request->user()->id.'_event'.time().'.'.request()->titleimage->getClientOriginalExtension();
            $path = $request->file('titleimage')->storeAs(
                'titleimage', $titleImageName
            );
        }
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $logoName = $request->user()->id.'_event'.time().'.'.request()->logo->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs(
                'logo', $logoName
            );
        }

        $event = Event::create([
            'eventname' => $request->eventname,
            'shortname' => $request->shortname,
            'subtitle' => $request->subtitle,
            'url' => $request->url,
            'email' => $request->email,
            'titleimage' => $titleImageName?$titleImageName:'',
            'logo' => $logoName?$logoName:'',
            'language' => $request->language,
            'description'=>$request->description,
            'customcss' =>$request ->customcss,

        ]);

       // $event = Event::find(1);
        $company = \App\Company::find($request->company);

        $event->company()->associate($company)->save();

        $quote = new \App\Quote;
        $quote->product_id = $request->package;
        $quote->save();
        $addones= $request->addone;
        foreach($addones as $addonId => $count){
            $quote->addons()->attach($addonId,['count'=>$count]);
        }
        $quote->save();

        $event->quote()->save($quote);

        return redirect('eventlist')->with('success','Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $companies = \App\Company::all();
        $packages = \App\Package::where(['type'=>1])->get();

        $attendeeAddons = \App\Package::where(['type'=>2,'totalattendee'=>0])->get();
        $slotAddons = \App\Package::where(['type'=>2,'totalslot'=>0])->get();
        return view('event.edit',['event'=>$event, 'companies' => $companies,'packages'=>$packages,'attendeeAddons'=>$attendeeAddons,'slotAddons'=>$slotAddons]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
