@extends('backend.layout.master')
@section('title', 'System Setting')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header ">
                    <span class="fs-4 fw-bold"> Users</span>
                </div>
                <div class="card-body">

                    <form action="{{ route('user.update',$user->id) }}" , method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your name" value="{{ $user->name }}">
                            @if ($errors->first('name'))
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter your email" value="{{ $user->name}}">
                            @if ($errors->first('email'))
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Enter your address" value="{{  $user->userDetail->address }}">
                            @if ($errors->first('address'))
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phpne" class="form-control"
                                placeholder="Enter your phone" value="{{  $user->userDetail->phone }}">
                            @if ($errors->first('mobile'))
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="image">Profile Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image" placeholder="Profile Image" name="image"
                                 value="">
                            @if ($errors->first('image'))
                                <span style="color: red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Add Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
