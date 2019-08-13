<?php

namespace App\Http\Controllers;

use App\Multiple;
use Illuminate\Http\Request;

class MultipleController extends Controller
{
    protected $rules =  [
        'multiple' => ['required', 'array'],
        'multiple.*.name' => ['required', 'string', 'max:255'],
        'multiple.*.gender' => ['required', 'integer'],
        'multiple.*.job' => ['required', 'string', 'max:255'],
        'multiple.*.designation' => ['required', 'string', 'max:255'],
        'multiple.*.contact' => ['required', 'integer'],
        'multiple.*.postalcode' => ['required', 'string', 'max:255'],
        'multiple.*.doj' => ['required', 'date', 'before:now'],
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multiple.form');
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

        if(is_array($request->multiple)){
            foreach ( $request->multiple as $row) {
                $multiple = new Multiple;
                $multiple->name = $row['name'];
                $multiple->gender = $row['gender'];
                $multiple->job = $row['job'];
                $multiple->designation = $row['designation'];
                $multiple->contact = $row['contact'];
                $multiple->postal_code = $row['postalcode'];
                $multiple->doj = $row['doj'];
                $multiple->save();
            }

        }

        return redirect()->route('eventlist')->with('success','multiple Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Multiple  $multiple
     * @return \Illuminate\Http\Response
     */
    public function show(Multiple $multiple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $multiples = Multiple::all();
        return view('multiple.editform',compact('multiples'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $this->validate($request,$this->rules);
         foreach ( $request->multiple as $row) {
            $multiple = Multiple::where('name',$row['name'])->get()->first();
            if(!$multiple){
                $multiple = new Multiple;
            }
            $multiple->name = $row['name'];
            $multiple->gender = $row['gender'];
            $multiple->job = $row['job'];
            $multiple->designation = $row['designation'];
            $multiple->contact = $row['contact'];
            $multiple->postal_code = $row['postalcode'];
            $multiple->doj = $row['doj'];
            $multiple->save();
        }
        return redirect()->route('editmultiple')->with('success','multiple updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(\Illuminate\Http\Request $request)
    {
        // call our event here
        $multiple = Multiple::where('name',$request->name)->get()->first()->delete();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
