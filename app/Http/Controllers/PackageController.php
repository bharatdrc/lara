<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    
    protected $rules = [
        'type' => ['required', 'integer'],
        'name' => ['required', 'string', 'max:255'],
        'totalattendee' => ['required', 'integer'],
        'totalslot' => ['required', 'integer'],
        'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where(['type'=>1])->paginate(1);
        $attendeeAddons = Package::where(['type'=>2,'totalattendee'=>0])->paginate(1);
        $slotAddons = Package::where(['type'=>2,'totalslot'=>0])->paginate(1);
        return view('package.list',['packages'=>$packages,'attendeeAddons'=>$attendeeAddons,'slotAddons'=>$slotAddons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.add');
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
        
        Package:: create([
            'type' => $request->type,
            'name' => $request->name,
            'totalattendee' => $request->totalattendee,
            'totalslot' => $request->totalslot,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect('listpackage')->with('sucess','Package added.');
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
