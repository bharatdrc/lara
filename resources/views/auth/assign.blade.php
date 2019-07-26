@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    <th>Roles</th>

	                </tr>
	            </thead>
	            <tbody>
	            	@if($users->count()>0)
					    @foreach ($users as $user)
					    <tr>
					        <td><a href="{{route('editroles',['user' => $user->id])}}">{{ $user->person->firstname }}</a></td>
					        <td>
					        	<ul>
						        	@foreach ($user->roles as $role)
						        		<li>{{$role->name}}</li>
						        	@endforeach
					        	</ul>
					        </td>
					    </tr>
					    @endforeach
					@else
						<tr><td>no data</td> </tr>
			    	@endif
			    </tbody>
        	</table>
			{{ $users->links() }}

        </div>
    </div>
</div>
@endsection