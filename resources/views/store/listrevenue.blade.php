@extends('layouts.app')

@section('content')
<div class="container">
    
    

    <div class="row justify-content-center">
        <div class="col-md-8">

           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    <th>Target</th>
	                    <th>Total Revenue</th>
	                    <th>daily revenue</th>
	                    <th>Action</th>

	                </tr>

	            </thead>
	            <tbody>
	            	@if($store->revenues->count()>0)
					    @foreach ($store->revenues as $revenue)
					    <tr>
					        <td>{{ $store->name }}</td>
					        <td>{{ $store->target }}</td>
					        <td>{{ $store->user->person->firstname }} {{ $store->user->person->lastname }}</td>
					        <td>{{ $revenue->dailyrevenue }}</td>
					        <td>{{ $revenue->created_at->format('d/m/Y') }}</td>
					        <td><a href="{{route('editstore',['store' => $store->id])}}">Edit</a></td>
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