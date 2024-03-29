<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    protected $rules =  [
        'firstname' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'jobtitle' => ['required', 'string', 'max:255'],
        'profiletext' => ['required', 'string', 'max:255'],
        'profileimage' => ['required','image', 'mimes:jpeg,jpg,png'],
        'language' => ['required', 'integer'],
        'interestedin' => ['required', 'string', 'max:255'],
        'canprovide' => ['required', 'string', 'max:255']
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
        return view('person.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if($request->has('q')){

            $persons = Person::where('firstname','like','%'.$request->q.'%')->orWhere('firstname','like','%'.$request->q.'%')->orWhere('jobtitle','like','%'.$request->q.'%')->orWhere('profiletext','like','%'.$request->q.'%')->orWhere('interestedin','like','%'.$request->q.'%')->orWhere('canprovide','like','%'.$request->q.'%')->orWhereHas('personUser', function (\Illuminate\Database\Eloquent\Builder $query) use ($request)  {
                $query->where('email', 'like', '%'.$request->q.'%');
            })->get();
           // $persons->appends(['q' => $request->q]);
        }else{
            $persons = Person::all();
        }
        return view('person.list',compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return view('person.update',['user'=>$request->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeupdate(Request $request)
    {
        if($request->isMethod('patch'))
        {
            $this->rules['email'] = 'required|string|email|max:255|unique:users,id,' . $request->user()->id;
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
