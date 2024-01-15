@extends('backend.layout.master')

@section('content')
    @if (session()->has('success'))
        <div class="alert-success"> {{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert-danger"> {{ session('error') }}</div>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" action="{{ route('user.password.reset') }}">
                        @csrf
                        <input type="hidden" id="resetId" name="id" >
                        <input type="password" name="password" class="form-control">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>


                    <div class="card-tools">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm m-1" style="width: 150px;">
                                    <form action="{{ route('user.index') }}" method="GET">
                                        @csrf
                                        <input type="text" name="search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <a href="{{ route('user.create') }}" class="float-end btn btn-info"><i
                                        class="fas fa-plus"></i><span class="hide-menu ps-2">Add Users </span></a>
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
                                <th>Username</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</>
                                    </td>
                                    {{-- <td>{{ $user->status }}</> --}}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }} " class="btn btn-success">Edit</a>
                                        <a href="{{ route('user.delete', $user->id) }} " class="btn btn-danger">Delete</a>
                                        <a href="" class="btn btn-primary resetBtn" data-user-id="{{ $user->id }}"
                                            data-toggle="modal" data-target="#exampleModalCenter">Reset
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('.resetBtn').click(function() {
                var id = $(this).data('user-id');
                if (id == '') {
                    return false;
                }
                $('#resetId').val(id);
                $('#exampleModalCenter').modal('show');

            });
        });
    </script>
@endsection
