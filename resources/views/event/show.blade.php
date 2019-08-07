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

				<div class="card-header">timeslots</div>

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

			            	@if($event->timeslots)
							    @foreach ($event->timeslots as $timeslot)
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



			<div class="card">

				<div class="card-header">Location</div>

				<div class="card-body">
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
                    <a href="{{route('addlocation',['event'=>$event])}}" >Add Location</a>
                </div>
            </div>

            <div class="card" id="participant-card">

				<div class="card-header">Participants</div>

				<div class="card-body">
					<table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>status</th>
                                <th>action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($event->participants)

                                <tr>
                                @foreach ($event->participants as $participant)

                                    <td>{{$participant->user->email}}</td>
                                    <td>{{$participant->status}}</td>
                                    <td>
                                    	@if($participant->status != 2)
	                                    	@if(!$participant->user->hasVerifiedEmail())
	                                    		<a href="{{route('sendActivationReminder',['eventparticipation'=>$participant])}}" > sendActivationReminder </a>
	                                    	@else
	                                    		<a id="sendWelcome" href="{{route('sendWelcomeNotification',['eventparticipation'=>$participant])}}" >sendWelcomeNotification</a>
	                                    	@endif
                                    	@endif
                                	</td>
                                </tr>
                                @endforeach
                            @else
                                <tr><td>no data</td> </tr>
                            @endif
                        </tbody>
                    </table>
                    <a href="{{route('addparticipant',['event'=>$event])}}" >Add Participants</a>
                </div>
            </div>




        </div>
    </div>
</div>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#sendWelcome").click(function(e){
        e.preventDefault();
        /*var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();*/
        $.ajax({
           type:'POST',
           url:"{{route('sendWelcomeNotification',['eventparticipation'=>1])}}",
          data:{name:'test'},
           success:function(data){
           	
              $('#participant-card .card-body').html('');
              
              $('#participant-card .card-body').html(data.responseBody);
           }
        });
	});

</script>


@endsection