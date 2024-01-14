@extends('backend.layout.master')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>


                    <div class="card-tools">
                        <div class="row">
                            <div class="col">


                                <div class="input-group input-group-sm m-1" style="width: 175px;">
                                    <form action="{{ route('user.index') }}" method="GET">
                                        @csrf
                                        <div class="input-group input-group-md">
                                            <input class="form-control" type="text"
                                                placeholder="Search" aria-label="Search" name="search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <a href="{{ route('user.create') }}" class="float-end btn btn-info"><i
                                        class="fas fa-plus"></i><span class="hide-menu ps-2"> Add Users </span></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>{{ $user->userDetail->phone }}</td> --}}
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }} " class="btn btn-success">Edit</a>
                                        <a href="{{ route('user.delete', $user->id) }} " class="btn btn-danger">Delete</a>
                                        <a href="" class="btn btn-primary resetBtn"
                                            data-user-id="{{ $user->id }}" data-toggle="modal"
                                            data-target="#exampleModalCenter">Reset
                                            Password</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
