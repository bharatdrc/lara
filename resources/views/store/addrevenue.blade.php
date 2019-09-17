@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Revenue</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saverevenue') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="dailyrevenue" class="col-md-4 col-form-label text-md-right">Todays Revenue</label>

                            <div class="col-md-6">
                                <input id="dailyrevenue" type="text" class="form-control @error('dailyrevenue') is-invalid @enderror" name="dailyrevenue" value="{{ old('dailyrevenue')}}" autocomplete="dailyrevenue" autofocus>

                                @error('dailyrevenue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <input id="store" type="hidden" name="store" value="{{$store->id}}" >




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
