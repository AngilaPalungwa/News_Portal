@extends('backend.layout.master')

@section('content')
@if (session()->has('success'))
<div class="alert-success"> {{ session('success') }}</div>
@endif

@if (session()->has('error'))
<div class="alert-danger"> {{ session('error') }}</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card ">

                    <div class="card-header m-3 bg-white">
                        <form class="form-inline ml-3" action="{{ route('category.index') }}" method="GET">
                            <span class="fs-4 fw-bold">View All Category</span>
                            <div class="input-group input-group-sm ml-auto">
                                <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-light btn-outline-secondary mr-2" type="submit">
                                        <i class="fas fa-search "></i>
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('category.create') }}" class="float-end btn btn-info"><i class="fas fa-plus"></i><span
                                    class="hide-menu ps-2">Add Category </span></a>
                        </form>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->status == 1)
                                                        <p><a href="" class="text-success">Active</a></p>
                                                    @else
                                                        <p><a href="" class="text-danger">In Active</a></p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('category.destroy',$category->id) }}}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('category.edit',$category->id) }}"
                                                            class="btn btn-success text-white btn-sm">Edit</a>
                                                        <button class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
