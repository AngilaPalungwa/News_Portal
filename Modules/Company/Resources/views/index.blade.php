@extends('backend.layout.master')

@section('content')
@if (session()->has('success'))
<div class="alert-success"> {{ session('success') }}</div>
@endif

@if (session()->has('error'))
<div class="alert-danger"> {{ session('error') }}</div>
@endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header ">

                        <span class="fs-4 fw-bold">General Setting</span>
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if (empty($company))
                            <a href="{{ route('company.create') }}" class="float-end btn btn-info">Add Company Detail</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($company))
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->contact }}</td>
                                        <td>
                                            <form action="{{ route('company.destroy', $company->id) }} " method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('company.edit', $company->id) }} " class="btn btn-success btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            {{-- <a href="{{ route('company.destroy', $company->id) }} " class="btn btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
