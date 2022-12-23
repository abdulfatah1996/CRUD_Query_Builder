@extends('layouts.app')

@section('title')
    View All countries
@endsection


@section('content')
    <div class="col-12">
        <div class="row text-center">
            <h5 class="font-monospace text-muted display-5 fw-bold">View All countries</h5>
        </div>
        <div class="row">
            <div class="col-8 border-end px-2 border-primary">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Capital</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                                $count = 1;

                            @endphp
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->code }}</td>
                                    <td>{{ $country->capital }}</td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <a href="#" class="btn-sm btn btn-outline-info rounded-circle">
                                                <i class='bx bx-edit'></i>
                                            </a>
                                            <a href="#" class="btn-sm btn btn-outline-danger rounded-circle">
                                                <i class='bx bx-trash-alt'></i>
                                            </a>
                                            <a href="#" class="btn-sm btn btn-outline-dark rounded-circle">
                                                <i class='bx bx-show'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $countries->links() }}
                </div>
            </div>
            <div class="col-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>
                            {{ session('success') }}
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h5 class="font-monospace text-muted fw-bold">Add New Countruy</h5>
                <form action="{{ route('countries.store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="name" type="text"
                                class="shadow-sm form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Countruy Name">

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
                                value="{{ old('code') }}" required autocomplete="code" placeholder="Enter Countruy Code">

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
                                value="{{ old('capital') }}" required autocomplete="capital"
                                placeholder="Enter Countruy Capital">

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
                                Store Countruy
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
