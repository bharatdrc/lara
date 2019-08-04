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
			<div class="card">
				@if($event->titleimage)
				<div class="card-header"><img src="{{URL::asset('/storage/titleimage/'.$event->titleimage)}}" alt="profile Pic" height="200" width="700"></div>
				@endif
				<div class="card-body">
					<h1>{{$event->eventname}}</h1>
					<h2>{{$event->subtitle}}</h2>
					<h2>{!! nl2br($event->description) !!}</h2>
				</div>
			</div>
			<div class="card">
				
				<div class="card-header">Timeslotes</div>
				
				<div class="card-body">
					<table class="table table-striped">
			            <thead>
			                <tr>
			                    <th>starttime</th>
			                    <th>endtime</th>
			                    
			                    <th>Action</th>

			                </tr>

			            </thead>
			            <tbody>

			            	@if($event->timeslotes)
							    @foreach ($event->timeslotes as $timeslot)
							    <tr>
							        <td>{{$timeslot->starttime}}</td>
							        <td>{{$timeslot->endtime}}</td>
							        <td>Edit</td>
							        
							    </tr>
							    @endforeach
							@else
								<tr><td>no data</td> </tr>
					    	@endif
					    </tbody>
        			</table>
        			<a href="{{route('addtimeslot',['event'=>$event])}}" >Add Timeslot</a>
				</div>
			</div>
           	


        </div>
    </div>
</div>
@endsection