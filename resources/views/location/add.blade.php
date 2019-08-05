@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Location</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storelocation',['event'=>$event]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="decription" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="decription" type="text" class="form-control @error('decription') is-invalid @enderror" name="decription" value="{{ old('decription')}}" autocomplete="decription" autofocus>

                                @error('decription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="0" @if((int) old('type') === 0) selected @endif >Altername</option>
                                    <option value="1" @if((int) old('type') === 1) selected @endif >Table</option>
                                    <option value="2" @if((int) old('type') === 2) selected @endif >Room</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="attendee" class="col-md-4 col-form-label text-md-right">Attendee</label>

                            <div class="col-md-6">
                                <input id="attendee" type="number" min="2" class="form-control @error('attendee') is-invalid @enderror" name="attendee" value="{{ old('attendee')}}" autocomplete="attendee">

                                @error('attendee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="timeslotes" class="col-md-4 col-form-label text-md-right">Type</label>
                            <div class="col-md-6">
                                <select name="timeslotes[]" multiple id="timeslotes" class="form-control @error('timeslotes') is-invalid @enderror">
                                    @if($event->timeslots)
                                    @foreach($event->timeslots as $timeslot)
                                        <option value="{{$timeslot->id}}" >{{$timeslot->starttime}}</option>
                                    @endforeach
                                    @endif

                                </select>

                                @error('timeslotes')
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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($event->locations)

                                <tr>
                                @foreach ($event->locations as $location)

                                    <td><a href="{{route('editlocation',['location' => $location->id])}}">{{ $location->name }}</a></td>
                                </tr>
                                @endforeach
                            @else
                                <tr><td>no data</td> </tr>
                            @endif
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
