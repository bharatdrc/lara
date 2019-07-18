@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeupdate') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname')?old('firstname'):$user->person->firstname }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname')?old('lastname'):$user->person->lastname }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')?old('email'):$user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobtitle" class="col-md-4 col-form-label text-md-right">Job Title</label>

                            <div class="col-md-6">
                                <input id="jobtitle" type="text" class="form-control @error('jobtitle') is-invalid @enderror" name="jobtitle" value="{{ old('jobtitle')?old('jobtitle'):$user->person->jobtitle }}" required autocomplete="jobtitle">

                                @error('jobtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profiletext" class="col-md-4 col-form-label text-md-right">Profile Text</label>

                            <div class="col-md-6">
                                <input id="profiletext" type="text" class="form-control @error('profiletext') is-invalid @enderror" name="profiletext" value="{{ old('profiletext')?old('profiletext'):$user->person->profiletext }}" autocomplete="profiletext">

                                @error('profiletext')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profileimage" class="col-md-4 col-form-label text-md-right">Profile Image</label>

                            <div class="col-md-6">

                                 <input type="file" id="profileimage" class="form-control @error('profileimage') is-invalid @enderror" name="profileimage">

                                @error('profileimage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right">Language</label>

                            <div class="col-md-6">
                                <select name="language" id="language" class="form-control @error('language') is-invalid @enderror">
                                    <option value="0">EN</option>
                                    <option value="1">DE</option>
                                </select>
                                @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="interestedin" class="col-md-4 col-form-label text-md-right">Interested In</label>

                            <div class="col-md-6">
                                <input id="interestedin" type="text" class="form-control @error('interestedin') is-invalid @enderror" name="interestedin" value="{{ old('interestedin')?old('interestedin'):$user->person->interestedin }}" autocomplete="interestedin">

                                @error('interestedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="canprovide" class="col-md-4 col-form-label text-md-right">Can Provide</label>

                            <div class="col-md-6">
                                <input id="canprovide" type="text" class="form-control @error('canprovide') is-invalid @enderror" name="canprovide" value="{{ old('canprovide')?old('canprovide'):$user->person->canprovide }}" autocomplete="canprovide">

                                @error('canprovide')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
