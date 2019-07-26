<?php

namespace App\Http\Controllers\Auth;

use App\Person;
use Illuminate\Http\Request;

class RolesController extends \App\Http\Controllers\Controller
{

    protected $rules =  [
        'name' => ['required', 'string', 'max:255', 'unique:roles'],
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
        $users = \App\User::paginate(1);
        return view('auth.assign',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roles = \App\Roles::all();
         return view('auth.createroles',['roles'=>$roles]);
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

        \App\Roles::create([
            'name' => $request->name
        ]);
        return back()->with('success','Role Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\User $user)
    {
        $roles = \App\Roles::all();
        $assignRoles = $user->roles->pluck('id')->all();

        return view('auth.editroles',['user'=>$user,'roles'=>$roles,'assignRoles'=>$assignRoles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\User $user)
    {

        if($request->isMethod('patch'))
        {
            $rules['roles'] = 'required|array|min:1';
        }
        $this->validate($request,$rules);

        $user->roles()->detach();

        foreach ($request->roles as $roleId) {
             $user->roles()->attach($roleId);
        }

        return back()->with('success','Roles assign');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeupdate(Request $request)
    {
        dd($request);
        if($request->isMethod('patch'))
        {
            $rules['roles'] = 'required|string';
        }

        $person = Person::where('user', $request->user()->id)->get()->first();

        if(isset($person->profileimage)){

            $this->rules['profileimage'] = 'image|mimes:jpeg,jpg,png';
            $profileimageName = $person->profileimage;
        }

        $this->validate($request,$this->rules);

        if ($request->hasFile('profileimage') && $request->file('profileimage')->isValid()) {
            $profileimageName = $request->user()->id.'_avatar'.time().'.'.request()->profileimage->getClientOriginalExtension();
            $path = $request->file('profileimage')->storeAs(
                'profileimage', $profileimageName
            );
        }

        $person->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'jobtitle' => $request->jobtitle,
            'profiletext' => $request->profiletext,
            'profileimage' => $profileimageName,
            'language' => $request->language,
            'interestedin' =>  $request->interestedin,
            'canprovide' => $request->canprovide,
        ]);

        $user = $request->user();
        $user->email = $request->email;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
