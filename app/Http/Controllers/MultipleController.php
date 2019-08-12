<?php

namespace App\Http\Controllers;

use App\Multiple;
use Illuminate\Http\Request;

class MultipleController extends Controller
{
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
        //
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
     * @param  \App\Multiple  $multiple
     * @return \Illuminate\Http\Response
     */
    public function edit(Multiple $multiple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Multiple  $multiple
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multiple $multiple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Multiple  $multiple
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multiple $multiple)
    {
        //
    }
}
