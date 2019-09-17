<?php

namespace App\Http\Controllers;

use App\revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    protected $rules = [
        'dailyrevenue' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        'store' => ['required', 'numeric']
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
     * @param \App\store $store;
     * @return \Illuminate\Http\Response
     */
    public function create(\App\store $store)
    {
        return view('store.addrevenue',['store'=>$store]);
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

        $revenue = \App\revenue::create([
            'dailyrevenue' => $request->dailyrevenue
        ]);
        $store = \App\store::find($request->store);

        $store->revenues()->save($revenue);


        return redirect()->route('storelist')->with('success','Revenue Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function show(revenue $revenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function edit(revenue $revenue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, revenue $revenue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function destroy(revenue $revenue)
    {
        //
    }
}
