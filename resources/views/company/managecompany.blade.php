@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<form action="{{route('managecompany')}}" method="POST" role="search">
	            {{ csrf_field() }}
	            <div class="input-group">
	                <input type="text" class="form-control" name="q"
	                    placeholder="Search company"> <span class="input-group-btn">
	                    <button type="submit" class="btn btn-default">
	                        <span class="glyphicon glyphicon-search"></span>
	                    </button>
	                </span>
            	</div>
            </form>
           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    
	                </tr>
	            </thead>
	            <tbody>
	            	@if($companies->count()>0)
					    @foreach ($companies as $company)
					    <tr>
					        <td><a href="{{route('editcompany',['company' => $company->id])}}">{{ $company->companyname }}</a></td>
					    </tr>
					    @endforeach
					@else
						<tr><td>no data</td> </tr>
			    	@endif
			    </tbody>
        	</table>
			{{ $companies->links() }}
			
        </div>
    </div>
</div>
@endsection