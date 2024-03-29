@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Event</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeevent') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">Company</label>

                            <div class="col-md-6">

                                <select name="company" id="company" class="form-control @error('company') is-invalid @enderror">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" @if((int) old('company') === $company->id) selected @endif >{{$company->companyname}}</option>
                                    @endforeach
                                </select>

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventname" class="col-md-4 col-form-label text-md-right">Event Name</label>

                            <div class="col-md-6">
                                <input id="eventname" type="text" class="form-control @error('eventname') is-invalid @enderror" name="eventname" value="{{ old('eventname')}}" autocomplete="eventname" autofocus>

                                @error('eventname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shortname" class="col-md-4 col-form-label text-md-right">Short Name</label>

                            <div class="col-md-6">
                                <input id="shortname" type="text" class="form-control @error('shortname') is-invalid @enderror" name="shortname" value="{{ old('shortname')}}" required autocomplete="shortname">

                                @error('shortname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitle" class="col-md-4 col-form-label text-md-right">Sub Title</label>

                            <div class="col-md-6">
                                <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle')}}" autocomplete="subtitle">

                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url')}}" autocomplete="url">

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titleimage" class="col-md-4 col-form-label text-md-right">Title Image</label>

                            <div class="col-md-6">

                                 <input type="file" id="titleimage" class="form-control @error('titleimage') is-invalid @enderror" name="titleimage">

                                    <img class="rounded-circle" src="/storage/profileimage/" width="100" height="100"/>

                                @error('titleimage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Logo Image</label>

                            <div class="col-md-6">

                                 <input type="file" id="logo" class="form-control @error('logo') is-invalid @enderror" name="logo">

                                    <img class="rounded-circle" src="/storage/profileimage/" width="100" height="100"/>

                                @error('logo')
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
                                    <option value="0" @if((int) old('language') === 0) selected @endif >EN</option>
                                    <option value="1" @if((int) old('language') === 1) selected @endif >DE</option>
                                </select>
                                @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description">{{ old('description')}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="customcss" class="col-md-4 col-form-label text-md-right">Customcss</label>

                            <div class="col-md-6">
                                <textarea id="customcss" class="form-control @error('customcss') is-invalid @enderror" name="customcss"  autocomplete="customcss">{{ old('customcss')}}</textarea>

                                @error('customcss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($packages->count()>0)

                                    <tr>
                                    @foreach ($packages as $package)


                                        <td><input type="radio" class="form-control @error('package') is-invalid @enderror" name="package" value="{{ $package->id}}" @if($loop->index==0)checked @endif ></td>
                                        <td><a href="{{route('editcompany',['package' => $package->id])}}">{{ $package->name }}</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td>no data</td> </tr>
                                @endif
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($attendeeAddons->count()>0)

                                    <tr>
                                    @foreach ($attendeeAddons as $addon)
                                        <td><input type="number" min="0" class="form-control @error('addons') is-invalid @enderror" name="addone[{{$addon->id}}]" value="0" ></td>
                                        <td><a href="{{route('editcompany',['addon' => $addon->id])}}">{{ $addon->name }}</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td>no data</td> </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($slotAddons->count()>0)

                                    <tr>
                                    @foreach ($slotAddons as $addon)
                                        <td><input type="number" min="0" class="form-control @error('addons') is-invalid @enderror" name="addone[{{$addon->id}}]" value="0" ></td>
                                        <td><a href="{{route('editcompany',['addon' => $addon->id])}}">{{ $addon->name }}</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td>no data</td> </tr>
                                @endif
                            </tbody>
                        </table>
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
