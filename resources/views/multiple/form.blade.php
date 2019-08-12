@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add multiple</div>
{{dump($errors)}}
                <div class="card-body">
                    <form method="POST" action="{{ route('storemultiple') }}" >
                        @csrf
                        <span class="fields">
                        <span class="fieldrow">
                        <div class="form-group row">
                            <label for="multiple[0][gender]" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">

                                <select name="multiple[0][gender]" id="gender" class="form-control @error('multiple.0.gender') is-invalid @enderror">
                                    <option value="0">Male</option>
                                    <option value="0">Female</option>
                                </select>

                                @error('multiple.0.gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('multiple.0.name') is-invalid @enderror" name="multiple[0][name]" value="{{ old('multiple.0.name')}}" autocomplete="name" autofocus>

                                @error('multiple.0.name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">Job</label>

                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control @error('multiple.0.job') is-invalid @enderror" name="multiple[0][job]" value="{{ old('multiple.0.job')}}" autocomplete="job" autofocus>

                                @error('multiple.0.job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control @error('multiple.0.designation') is-invalid @enderror" name="multiple[0][designation]" value="{{ old('multiple.0.designation')}}" autocomplete="designation" autofocus>

                                @error('multiple.0.designation]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">Contact</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('multiple.0.contact') is-invalid @enderror" name="multiple[0][contact]" value="{{ old('multiple.0.contact')}}" autocomplete="contact" autofocus>

                                @error('multiple.0.contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postalcode" class="col-md-4 col-form-label text-md-right">Postal Code</label>

                            <div class="col-md-6">
                                <input id="postalcode" type="text" class="form-control @error('multiple.0.postalcode') is-invalid @enderror" name="multiple[0][postalcode]" value="{{ old('multiple.0.postalcode')}}" autocomplete="postalcode" autofocus>

                                @error('multiple.0.postalcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="doj" class="col-md-4 col-form-label text-md-right">DOJ</label>

                            <div class="col-md-6">
                                <input id="doj" type="text" class="form-control datepicker @error('multiple.0.doj') is-invalid @enderror" name="multiple[0][doj]" value="{{ old('multiple.0.doj')}}" autocomplete="doj" autofocus>

                                @error('multiple.0.doj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </span>
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
                minDate: moment(),
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
                            minDate: moment(),
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
              $(this).closest('.fieldrow').remove();
            });

        });
</script>

@endsection
