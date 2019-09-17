@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@if(Session::has('success'))
			    <div class="alert alert-success">
			        {{ Session::get('success') }}
			    </div>
			@endif
           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    <th>Target</th>
	                    <th>Manager</th>
	                    <th>Action</th>

	                </tr>

	            </thead>
	            <tbody>
	            	@if($stores->count()>0)
					    @foreach ($stores as $store)
					    <tr>
					        <td>{{ $store->name }}</td>
					        <td>{{ $store->target }}</td>
					        <td>{{ $store->user->person->firstname }} {{ $store->user->person->lastname }}</td>
					        <td><a href="{{route('editstore',['store' => $store->id])}}">Edit</a></td>
					    </tr>
					    @endforeach
					@else
						<tr><td>no data</td> </tr>
			    	@endif
			    </tbody>
        	</table>


        </div>
        <div class="col-md-8">
	    	<a href="{{route('addstore')}}">Add Stores</a>
	    </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    <th>Target</th>
	                    <th>Total Revenue</th>
	                    <th>Status</th>
	                    <th>Action</th>

	                </tr>

	            </thead>
	            <tbody>
	            	@if($stores->count()>0)
					    @foreach ($stores as $store)
					    <tr>
					        <td>{{ $store->name }}</td>
					        <td>{{ $store->target }}</td>
					        <td>{{ $store->user->person->firstname }} {{ $store->user->person->lastname }}</td>
					        <td><a href="{{route('editstore',['store' => $store->id])}}">Edit</a></td>
					    </tr>
					    @endforeach
					@else
						<tr><td>no data</td> </tr>
			    	@endif
			    </tbody>
        	</table>


        </div>
        <div class="col-md-8">
	    	<a href="{{route('addrevenue',['store'=>$store])}}">Add Today Revenue</a>
	    </div>


    </div>
</div>
@endsection