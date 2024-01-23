@extends('backend.layout.master')

@section('content')
@section('content')
@if (session()->has('success'))
<div class="alert-success"> {{ session('success') }}</div>
@endif

@if (session()->has('error'))
<div class="alert-danger"> {{ session('error') }}</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-right-0">
                <div class="card-header m-3 bg-white">
                    <form class="form-inline ml-3" action="{{ route('post.index') }}" method="GET">
                        <a href="{{ route('post.index') }}" class="text-decoration-none text-black"><span class="fs-4 fw-bold ">Posts</span></a>
                        <div class="input-group input-group-sm ml-auto">
                            <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-light btn-outline-secondary mr-2" type="submit">
                                    <i class="fas fa-search "></i>
                                </button>
                            </div>
                        </div>
                        <a href="{{ route('post.create') }}" class="float-end btn btn-info"><i class="fas fa-plus"></i><span
                                class="hide-menu ps-2">Add Users </span></a>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">

                        @foreach ($posts as $post)
                            <div class="col-md-3">
                                <div class="card-hover">
                                    <div class="card-body">
                                        <h5>{{ $post->title }}</h5>
                                        <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-footer">
                                        <form action="{{ route('post.destroy',$post->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info">Edit</a>
                                            {{-- <a href="/post/{{ $post->id }}" class="btn badge bg-success"
                                                target="page">Detail</a> --}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            {{ $posts->links() }}

        </div>
    </div>
</div>
@endsection
