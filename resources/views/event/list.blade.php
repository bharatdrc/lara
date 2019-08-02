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
	                    <th></th>
	                    <th>Action</th>

	                </tr>

	            </thead>
	            <tbody>
	            	@if($events->count()>0)
					    @foreach ($events as $event)
					    <tr>
					        <td><a href="{{route('editevent',['event' => $event->id])}}">{{ $event->eventname }}</a></td>
					        <td><a href="{{route('editevent',['event' => $event->id])}}">Edit</a></td>
					        <td><a href="{{route('showevent',['event' => $event->id])}}">Show</a></td>
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