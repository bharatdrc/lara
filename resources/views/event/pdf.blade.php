
<div class="container">
    <div class="row ">
        <div class="col-md-8">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Custom Field</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storecustomfield',['event'=>$event->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">

                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="0" @if(old('type')==0) selected @endif>Textfield</option>
                                    <option value="1" @if(old('type')==1) selected @endif>Dropdown</option>
                                    <option value="2" @if(old('type')==2) selected @endif >Checkbox</option>
                                    <option value="3" @if(old('type')==3) selected @endif>Radio</option>
                                    <option value="4" @if(old('type')==4) selected @endif>Textarea</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="options" class="col-md-4 col-form-label text-md-right">Options</label>

                            <div class="col-md-6">

                                <textarea name="options" class="form-control @error('options') is-invalid @enderror">{{old('options')}}</textarea>

                                @error('options')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="required" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input type="radio" name="required" value="1"> Required<br>
                                @error('required')
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

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Required</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($event->customfields)

                                    <tr>
                                    @foreach ($event->customfields as $customfield)
                                        <td>{{$customfield->name}}</td>
                                        <td>{{$customfield->type}}</td>
                                        <td>{{$customfield->required}}</td>
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
    </div>
</div>
