@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Event</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storetimeslot',['event'=>$event]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="startdate" class="col-md-4 col-form-label text-md-right">Start Date</label>

                            <div class="col-md-6">
                                <input id="startdate" type="text" class="form-control @error('startdate') is-invalid @enderror datepicker" name="startdate" value="{{ old('startdate')}}" autocomplete="eventname" autofocus>

                                @error('startdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="starttime" class="col-md-4 col-form-label text-md-right">start time of first timeslot</label>

                            <div class="col-md-6">
                                <input id="starttime" type="text" class="form-control @error('starttime') is-invalid @enderror" name="starttime" value="{{ old('starttime')}}" required autocomplete="shortname">

                                @error('starttime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">Duration In Minutes</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" min="10" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration')?old('duration'):25}}" autocomplete="duration">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="break" class="col-md-4 col-form-label text-md-right">Break between slot</label>

                            <div class="col-md-6">
                                <input id="break" type="number" min="5" class="form-control @error('break') is-invalid @enderror" name="break" value="{{ old('break')?old('break'):5}}" autocomplete="break">

                                @error('break')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slots" class="col-md-4 col-form-label text-md-right">Slots</label>

                            <div class="col-md-6">
                                <input id="slots" type="number" min="1" class="form-control @error('slots') is-invalid @enderror" name="slots" value="{{ old('slots')?old('slots'):1}}" autocomplete="slots">

                                @error('slots')
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
<script type="text/javascript">
     
     $(document).ready(function(){

            
            $('#startdate').datetimepicker({
                format: 'YYYY-MM-DD',
                minDate: moment(),
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
            $('#starttime').datetimepicker({
                format: 'HH:mm',
                minDate: moment().add(1, 'h'),
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        });
</script>
@endsection
