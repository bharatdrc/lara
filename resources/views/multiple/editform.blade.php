@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit multiple</div>


                <div class="card-body">
                    <form method="POST" action="{{ route('updatemultiple') }}" >
                        @csrf
                        @method('patch')
                        <span class="fields">
                        @if(!is_null((old('multiple'))))

                            @foreach(old('multiple') as $key=>$rowArray)

                                <span class="fieldrow">
                                    <div class="form-group row">
                                        <label for="multiple[{{$key}}][gender]" class="col-md-4 col-form-label text-md-right">Gender</label>

                                        <div class="col-md-6">

                                            <select name="multiple[{{$key}}][gender]" id="gender" class="form-control @error('multiple.$key.gender') is-invalid @enderror">
                                                <option value="0">Male</option>
                                                <option value="0">Female</option>
                                            </select>

                                            @error('multiple.$key.gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('multiple.'.$key.'.name') is-invalid @enderror" name="multiple[{{$key}}][name]" value="{{ old('multiple.'.$key.'.name')}}" autocomplete="name" autofocus>

                                            @error('multiple.'.$key.'.name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job" class="col-md-4 col-form-label text-md-right">Job</label>

                                        <div class="col-md-6">
                                            <input id="job" type="text" class="form-control @error('multiple.'.$key.'.job') is-invalid @enderror" name="multiple[{{$key}}][job]" value="{{ old('multiple.'.$key.'.job')}}" autocomplete="job" autofocus>

                                            @error('multiple.'.$key.'.job')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                                        <div class="col-md-6">
                                            <input id="designation" type="text" class="form-control @error('multiple.'.$key.'.designation') is-invalid @enderror" name="multiple[{{$key}}][designation]" value="{{ old('multiple.'.$key.'.designation')}}" autocomplete="designation" autofocus>

                                            @error('multiple.'.$key.'.designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact" class="col-md-4 col-form-label text-md-right">Contact</label>

                                        <div class="col-md-6">
                                            <input id="contact" type="text" class="form-control @error('multiple.'.$key.'.contact') is-invalid @enderror" name="multiple[{{$key}}][contact]" value="{{ old('multiple.'.$key.'.contact')}}" autocomplete="contact" autofocus>

                                            @error('multiple.'.$key.'.contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="postalcode" class="col-md-4 col-form-label text-md-right">Postal Code</label>

                                        <div class="col-md-6">
                                            <input id="postalcode" type="text" class="form-control @error('multiple.'.$key.'.postalcode') is-invalid @enderror" name="multiple[{{$key}}][postalcode]" value="{{ old('multiple.'.$key.'.postalcode')}}" autocomplete="postalcode" autofocus>

                                            @error('multiple.'.$key.'.postalcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="doj" class="col-md-4 col-form-label text-md-right">DOJ</label>

                                        <div class="col-md-6">
                                            <input id="doj" type="text" class="form-control datepicker @error('multiple.'.$key.'.doj') is-invalid @enderror" name="multiple[{{$key}}][doj]" value="{{ old('multiple.'.$key.'.doj')}}" autocomplete="doj" autofocus>

                                            @error('multiple.'.$key.'.doj')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($key!=0)
                                    <a href="javascript:void(0);" class="remove" >remove</a>
                                    @endif
                                </span>

                            @endforeach
                        @endif
                        @if($multiples && is_null((old('multiple'))))

                            @foreach($multiples as $key=>$rowArray)

                                <span class="fieldrow">
                                    <div class="form-group row">
                                        <label for="multiple[{{$key}}][gender]" class="col-md-4 col-form-label text-md-right">Gender</label>

                                        <div class="col-md-6">

                                            <select name="multiple[{{$key}}][gender]" id="gender" class="form-control @error('multiple.$key.gender') is-invalid @enderror">
                                                <option value="0">Male</option>
                                                <option value="0">Female</option>
                                            </select>

                                            @error('multiple.$key.gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('multiple.'.$key.'.name') is-invalid @enderror" name="multiple[{{$key}}][name]" value="{{ old('multiple.'.$key.'.name')?old('multiple.'.$key.'.name'):$rowArray['name']}}" autocomplete="name" autofocus>

                                            @error('multiple.'.$key.'.name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job" class="col-md-4 col-form-label text-md-right">Job</label>

                                        <div class="col-md-6">
                                            <input id="job" type="text" class="form-control @error('multiple.'.$key.'.job') is-invalid @enderror" name="multiple[{{$key}}][job]" value="{{ old('multiple.'.$key.'.job')?old('multiple.'.$key.'.job'):$rowArray['job']}}" autocomplete="job" autofocus>

                                            @error('multiple.'.$key.'.job')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                                        <div class="col-md-6">
                                            <input id="designation" type="text" class="form-control @error('multiple.'.$key.'.designation') is-invalid @enderror" name="multiple[{{$key}}][designation]" value="{{ old('multiple.'.$key.'.designation')?old('multiple.'.$key.'.designation'):$rowArray['designation']}}" autocomplete="designation" autofocus>

                                            @error('multiple.'.$key.'.designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact" class="col-md-4 col-form-label text-md-right">Contact</label>

                                        <div class="col-md-6">
                                            <input id="contact" type="text" class="form-control @error('multiple.'.$key.'.contact') is-invalid @enderror" name="multiple[{{$key}}][contact]" value="{{ old('multiple.'.$key.'.contact')?old('multiple.'.$key.'.contact'):$rowArray['contact']}}" autocomplete="contact" autofocus>

                                            @error('multiple.'.$key.'.contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="postalcode" class="col-md-4 col-form-label text-md-right">Postal Code</label>

                                        <div class="col-md-6">
                                            <input id="postalcode" type="text" class="form-control @error('multiple.'.$key.'.postalcode') is-invalid @enderror" name="multiple[{{$key}}][postalcode]" value="{{ old('multiple.'.$key.'.postalcode')?old('multiple.'.$key.'.postalcode'):$rowArray['postal_code']}}" autocomplete="postalcode" autofocus>

                                            @error('multiple.'.$key.'.postalcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="doj" class="col-md-4 col-form-label text-md-right">DOJ</label>

                                        <div class="col-md-6">
                                            <input id="doj" type="text" class="form-control datepicker @error('multiple.'.$key.'.doj') is-invalid @enderror" name="multiple[{{$key}}][doj]" value="{{ old('multiple.'.$key.'.doj')?old('multiple.'.$key.'.doj'):$rowArray['doj']}}}}" autocomplete="doj" autofocus>

                                            @error('multiple.'.$key.'.doj')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($key!=0)
                                        <a href="javascript:void(0);" class="remove" >remove</a>
                                    @endif
                                </span>

                            @endforeach
                        @endif
                        </span>


                        <a href="javascript:void(0);" id="addmultiple" >Add</a>
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
</div>
<script type="text/javascript">
     $(document).ready(function(){
            $('.datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: moment(),
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
             $(document).on("click","#addmultiple", function(){
                $( ".fields .fieldrow:first" ).clone().appendTo( ".fields" ).find("input").val("").end();
                var currentindex = $( ".fields").find('.fieldrow').index($(".fieldrow:last"));

                $(".fieldrow:last").find(':input,:radio,:checkbox').each(function(i) {
                    var inputName = $(this).attr('name');
                    inputName=inputName.replace("[0]", "["+parseInt(currentindex)+"]");
                    $(this).attr("name",inputName);
                    if($(this).hasClass('datepicker')){
                        $(this).datetimepicker({
                            format: 'YYYY-MM-DD',
                            maxDate: moment(),
                            icons: {
                                time: "fa fa-clock-o",
                                date: "fa fa-calendar",
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove'
                            }
                        });
                    }
                    /*var myfield = myfields.eq(i);
                    myfield.addClass("myflied_"+i);*/
                });

                $(".fieldrow:last").append( '<a href="javascript:void(0);" class="remove" >remove</a>' );
            });
            $(document).on("click",".remove", function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var name = $(this).closest('.fieldrow').find("#name").val();

                $.ajax({
                   type:'DELETE',
                   url:"{{route('deletemultiple')}}",
                    data:{name:name},
                   success:function(data){
                        alert(data.success);
                     /* $('#participant-card .card-body').html('');

                      $('#participant-card .card-body').html(data.responseBody);*/
                   }
                });

              $(this).closest('.fieldrow').remove();
            });

        });
</script>

@endsection
