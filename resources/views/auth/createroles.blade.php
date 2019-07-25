@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	
           	<table class="table table-striped">
	            <thead>
	                <tr>
	                    <th>Name</th>
	                    
	                    
	                </tr>
	            </thead>
	            <tbody>
	            	@if($roles->count()>0)
					    @foreach ($roles as $role)
					    <tr>
					        <td>{{ $role->name }}</td>
					    </tr>
					    @endforeach
					@else
						<tr><td>no data</td> </tr>
			    	@endif
			    </tbody>
        	</table>
			<div class="card">
                <div class="card-header">Create role</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storerole') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="rolename" class="col-md-4 col-form-label text-md-right">Role Name</label>

                            <div class="col-md-6">
                                <input id="rolename" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" autocomplete="name" autofocus>

                                @error('name')
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
                </div>
			
        </div>
    </div>
</div>
@endsection