@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Assign roles</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateroles',['user'=>$user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="companyname" class="col-md-4 col-form-label text-md-right">name</label>

                            <div class="col-md-6">
                                {{$user->person->firstname}} {{$user->person->lastname}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="housenumber" class="col-md-4 col-form-label text-md-right">Roles</label>

                            <div class="col-md-6">

                                <select name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple>
                                  @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(in_array($role->id,$assignRoles)) selected @endif >{{$role->name}}</option>
                                  @endforeach
                                </select>

                                @error('roles')
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