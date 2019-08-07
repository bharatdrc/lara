	
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name1</th>
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
