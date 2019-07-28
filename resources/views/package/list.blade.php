@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Package</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if($packages->count()>0)
                                
                                <tr>
                                @foreach ($packages as $package)
                                    <td><a href="{{route('editcompany',['package' => $package->id])}}">{{ $package->name }}</a></td>
                                </tr>
                                @endforeach
                            @else
                                <tr><td>no data</td> </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $packages->links() }}
                    
                    

                </div>
                 <div class="clearfix"></div>
                <div class="card">
                    <div class="card-header">Attendee AddOne</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($attendeeAddons->count()>0)
                                    
                                    <tr>
                                    @foreach ($attendeeAddons as $addon)
                                        <td><a href="{{route('editcompany',['addon' => $addon->id])}}">{{ $addon->name }}</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td>no data</td> </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $attendeeAddons->links() }}
                        
                        

                    </div>
                </div>
                 <div class="clearfix"></div>
                <div class="card">
                    <div class="card-header">Slot AddOne</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($slotAddons->count()>0)
                                    
                                    <tr>
                                    @foreach ($slotAddons as $addon)
                                        <td><a href="{{route('editcompany',['addon' => $addon->id])}}">{{ $addon->name }}</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td>no data</td> </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $slotAddons->links() }}
                        
                        

                    </div>
                </div>
                 <div class="clearfix"></div>

                    <a class="btn btn-info btn-fill" href="{{route('addpackage')}}">Add Product</a>
            </div>
        </div>
    </div>
</div>
@endsection
