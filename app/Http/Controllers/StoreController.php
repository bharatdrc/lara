<?php

namespace App\Http\Controllers;

use App\store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $rules =  [
        'name' => ['required', 'string', 'max:255', 'unique:stores'],
        'target' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        'user' => ['required'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = store::all();
        return view('store.list',['stores'=>$stores]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \ Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = \App\User::whereHas('roles', function($query) {
            $query->where('id', 6);
        })->get();

        return view('store.add',['users' => $users]);
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

        $store = store::create([
            'name' => $request->name,
            'target' => $request->target
        ]);

        $user = \App\User::find($request->user);

        $user->stores()->save($store);
        return redirect()->route('storelist')->with('success','Store Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store)
    {
        //
    }
}
