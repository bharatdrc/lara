<?php

namespace App\Http\Controllers;

use App\Customfield;
use Illuminate\Http\Request;

class CustomfieldController extends Controller
{

    protected $rules = [
        'type' => ['required', 'integer'],
        'name' => ['required', 'string', 'max:255'],
        'required' => ['required', 'integer'],
        'options' => ['required_if:type,1,2,3' ],
    ];


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $customfield = new Customfield();

        $messages = [
            'required_if' => 'The options field is required when :attribute is '.$customfield->inputType[$request->type]
        ];
        $this->validate($request,$this->rules,$messages);

        Customfield:: create([
            'type' => $request->type,
            'name' => $request->name,
            'required' => $request->required,
            'options' => $request->options,
            'event_id' => $event->id,
        ]);

        return redirect()->route('editevent',['event'=>$event])->with('success','custom field added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
