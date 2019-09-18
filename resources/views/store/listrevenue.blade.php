@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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