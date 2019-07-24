@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Company</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatecompany',['company'=>$company->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="companyname" class="col-md-4 col-form-label text-md-right">Company Name</label>

                            <div class="col-md-6">
                                <input id="companyname" type="text" class="form-control @error('companyname') is-invalid @enderror" name="companyname" value="{{old('companyname')?old('companyname'):$company->companyname}}" autocomplete="companyname" autofocus>

                                @error('companyname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="housenumber" class="col-md-4 col-form-label text-md-right">House Number</label>

                            <div class="col-md-6">
                                <input id="housenumber" type="text" class="form-control @error('housenumber') is-invalid @enderror" name="housenumber" value="{{old('housenumber')?old('housenumber'):$company->mainAddress->housenumber}}" autocomplete="housenumber" autofocus>

                                @error('housenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">Street</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{old('street')?old('street'):$company->mainAddress->street}}" autocomplete="street" autofocus>

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{old('city')?old('city'):$company->mainAddress->city}}" autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{old('country')?old('country'):$company->mainAddress->country}}" autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postalcode" class="col-md-4 col-form-label text-md-right">postalcode</label>

                            <div class="col-md-6">
                                <input id="postalcode" type="text" class="form-control @error('postalcode') is-invalid @enderror" name="postalcode" value="{{old('postalcode')?old('postalcode'):$company->mainAddress->postalcode}}" autocomplete="postalcode" autofocus>

                                @error('postalcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="additionalinfo" class="col-md-4 col-form-label text-md-right">Additional Info</label>
                            <div class="col-md-6">
                                <textarea id="additionalinfo" class="form-control @error('additionalinfo') is-invalid @enderror" name="additionalinfo" rows="4" cols="50">{{old('additionalinfo')?old('additionalinfo'):$company->mainAddress->additionalinfo}}</textarea>

                                @error('additionalinfo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="checkbox" class="col-md-6 col-form-label text-md-right" id="isbillingaddress" name="isbillingaddress" value="1" @if($company->address!=$company->invoiceaddress ) checked @endif >
                            <label for="isbillingaddress" class="col-form-label">Is Billing Address Different</label>
                        </div>

                        <div id="billingaddress">
                            <div class="form-group row">
                                <label for="billinghousenumber" class="col-md-4 col-form-label text-md-right">House Number</label>

                                <div class="col-md-6">
                                    <input id="billinghousenumber" type="text" class="form-control @error('billinghousenumber') is-invalid @enderror" name="billinghousenumber" value="{{old('billinghousenumber')?old('billinghousenumber'):$company->billingAddress->housenumber}}" autocomplete="billinghousenumber" autofocus>

                                    @error('billinghousenumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billingstreet" class="col-md-4 col-form-label text-md-right">Street</label>

                                <div class="col-md-6">
                                    <input id="billingstreet" type="text" class="form-control @error('billingstreet') is-invalid @enderror" name="billingstreet" value="{{old('billingstreet')?old('billingstreet'):$company->billingAddress->street}}" autocomplete="billingstreet" autofocus>

                                    @error('billingstreet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billingcity" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="billingcity" type="text" class="form-control @error('billingcity') is-invalid @enderror" name="billingcity" value="{{old('billingcity')?old('billingcity'):$company->billingAddress->city}}" autocomplete="billingcity" autofocus>

                                    @error('billingcity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billingcountry" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <input id="billingcountry" type="text" class="form-control @error('billingcountry') is-invalid @enderror" name="billingcountry" value="{{old('billingcountry')?old('billingcountry'):$company->billingAddress->country}}" autocomplete="billingcountry" autofocus>

                                    @error('billingcountry')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billingpostalcode" class="col-md-4 col-form-label text-md-right">postalcode</label>

                                <div class="col-md-6">
                                    <input id="billingpostalcode" type="text" class="form-control @error('billingpostalcode') is-invalid @enderror" name="billingpostalcode" value="{{old('billingpostalcode')?old('billingpostalcode'):$company->billingAddress->postalcode}}" autocomplete="billingpostalcode" autofocus>

                                    @error('billingpostalcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection