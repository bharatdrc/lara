@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<form method="POST" action="{{ route('listrevenue',['store'=>$store]) }}" enctype="multipart/form-data">
        		@csrf
	        	<select name="month">
	        		<option value="1">jan</option>
	        		<option value="2">feb</option>
	        		<option value="3">march</option>
	        		<option value="4">april</option>
	        		<option value="5">may</option>
	        		<option value="6">june</option>
	        		<option value="7">jully</option>
	        		<option value="8">aug</option>
	        		<option value="9">sep</option>
	        		<option value="10">oct</option>
	        		<option value="11">nov</option>
	        		<option value="12">dec</option>
	        	</select>
	        	<button type="submit" class="btn btn-primary">
                    Submit
                </button>
        	</form>
           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    <th>Manager</th>
	                    <th>daily revenue</th>
	                    <th>Action</th>

	                </tr>

	            </thead>
	            <tbody>
	            	@if($store->revenues->count()>0)
	            	@php $total = 0; @endphp

					    @foreach ($store->revenues as $revenue)
					    <tr>
					        <td>{{ $store->name }}</td>
					        <td>{{ $store->user->person->firstname }} {{ $store->user->person->lastname }}</td>
					        <td>{{ $revenue->dailyrevenue }}</td>
					        <td>{{ $revenue->created_at->format('d/m/Y') }}</td>
					        <td><a href="{{route('editstore',['store' => $store->id])}}">Edit</a></td>
					    </tr>
					   @php  $total += $revenue->dailyrevenue; @endphp
					    @endforeach

					    <tr>
					        <td>Target</td>
					        <td>{{ $store->target }}</td>
					        <td></td>

					        <td> {{$total}}</td>
					        @if($total >=$store->target)
					        	<td>Hurray, Profit</td>
					        @else
					        	<td>Hurry up fast, Loss</td>
					        @endif
					    </tr>
					@else
						<tr><td>no data</td> </tr>
			    	@endif
			    </tbody>
        	</table>
        </div>
    </div>
</div>
@endsection