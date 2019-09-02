<?php

namespace App\Http\Controllers;

use App\Vue;
use Illuminate\Http\Request;

class VueController extends Controller
{
    public $rules = [
        'name'=> ['required', 'string', 'max:255'],
        'address'=> ['required', 'string', 'max:255'],

    ];

    /**1
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
        return view('vue.add');
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
        Vue::create([
            'name'=>$request->name,
            'address'=>$request->address,
        ]);
        return redirect('vueform')->with('success','Item Created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vue  $vue
     * @return \Illuminate\Http\Response
     */
    public function show(Vue $vue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vue  $vue
     * @return \Illuminate\Http\Response
     */
    public function edit(Vue $vue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vue  $vue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vue $vue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vue  $vue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vue $vue)
    {
        //
    }
}
