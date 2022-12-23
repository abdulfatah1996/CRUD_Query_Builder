@extends('layouts.app')

@section('title')
    Edit Country
@endsection


@section('content')
    <div class="col-5 p-3 mx-auto shadow-lg">
        <div class="row">
            <h5 class="font-monospace text-muted display-5 text-center fw-bold">Edit Country</h5>
            <div class="col-10 mx-auto">
                <form action="{{ route('countries.update', ['country' => $country]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="name" type="text"
                                class="shadow-sm form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $country->name }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="code" type="text"
                                class="shadow-sm form-control @error('code') is-invalid @enderror" name="code"
                                value="{{ $country->code }}" required autocomplete="code">

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="capital" type="text"
                                class="shadow-sm form-control @error('capital') is-invalid @enderror" name="capital"
                                value="{{ $country->capital }}" required autocomplete="capital">

                            @error('capital')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="mx-1">
                                    <i class='bx bx-save'></i>
                                </span>
                                Update Countruy
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
