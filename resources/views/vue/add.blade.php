@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Items</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storevueform') }}" @submit.prevent="onSubmit($event)" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" v-model="form.originaldata.name" autocomplete="name" autofocus>
                                <span v-if="form.formerrors.has('name')" role="alert">
                                    <strong>@{{ form.formerrors.get('name') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="addreaa" type="text" class="form-control @error('address') is-invalid @enderror" name="address" v-model="form.originaldata.address" autocomplete="address">
                                <span v-if="form.formerrors.has('address')" role="alert">
                                    <strong>@{{ form.formerrors.get('address') }}</strong>
                                </span>
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
</div>
@endsection
