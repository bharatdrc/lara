<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    protected $rules =  [
        'companyname' => ['required', 'string', 'max:255', 'unique:company'],
        'housenumber' => ['required', 'string', 'max:255'],
        'street' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'postalcode' => ['required','numeric', 'regex:/\b\d{5}\b/']
    ];

    protected $billingRules =  [
        'billinghousenumber' => ['required', 'string', 'max:255'],
        'billingstreet' => ['required', 'string', 'max:255'],
        'billingcity' => ['required', 'string', 'max:255'],
        'billingcountry' => ['required', 'string', 'max:255'],
        'billingpostalcode' => ['required','numeric', 'regex:/\b\d{5}\b/']
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->has('isbillingaddress'))
        {
            $this->rules = array_merge($this->rules,$this->billingRules);
        }

        $this->validate($request,$this->rules);

        $address = \App\Address::create([
            'housenumber' => $request->housenumber,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'postalcode' => $request->postalcode,
            'additionalinfo' => $request->additionalinfo,
        ]);

        if($request->has('isbillingaddress'))
        {
           $billingaddress = \App\Address::create([
                'housenumber' => $request->billinghousenumber,
                'street' => $request->billingstreet,
                'city' => $request->billingcity,
                'country' => $request->billingcountry,
                'postalcode' => $request->billingpostalcode,
            ]);
        }

        $company = Company::create([
            'companyname' => $request->companyname,
            'address' => $address->id,
            'invoiceaddress' => isset($billingaddress) ? $billingaddress->id:$address->id,
        ]);

        $person = $request->user()->person;
        $person->company = $company->id;
        $person->save();

        return back()
            ->with('success','company created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $company = $request->user()->person->company;
        dd($company);
        return view('company.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
