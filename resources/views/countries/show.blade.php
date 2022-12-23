@extends('layouts.app')

@section('title')
    Show Country
@endsection


@section('content')
    <div class="col-5 p-3 mx-auto shadow-lg">
        <div class="row">
            <h5 class="font-monospace text-muted display-5 text-center fw-bold">Show Country</h5>
            <div class="col-10 mx-auto">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input id="name" type="text" class="shadow-sm form-control" name="name"
                            value="{{ $country->name }}" required autocomplete="name" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input id="code" type="text" class="shadow-sm form-control" name="code"
                            value="{{ $country->code }}" required autocomplete="code" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input id="capital" type="text" class="shadow-sm form-control" name="capital"
                            value="{{ $country->capital }}" required autocomplete="capital" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <a href="{{ url('countries') }}" class="btn btn-primary">
                            Countries
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
