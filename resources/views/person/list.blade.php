@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('listprofile')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search Person"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>Profile Text</th>
                        <th>Interested In</th>
                        <th>Can Provide</th>
                    </tr>
                </thead>
                <tbody>
                    @if($persons)
                        @foreach ($persons as $person)
                        <tr>
                            <td>{{ $person->firstname }}</td>
                            <td>{{ $person->lastname }}</td>
                            <td>{{ $person->personUser->email }}</td>
                            <td>{{ $person->jobtitle }}</td>
                            <td>{{ $person->profiletext }}</td>
                            <td>{{ $person->interestedin }}</td>
                            <td>{{ $person->canprovide }}</td>
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
@endsection