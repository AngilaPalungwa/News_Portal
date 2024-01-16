@extends('backend.layout.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header mb-3 ">
                    <span class="fs-4 fw-bold">Category</span>
                    <a href="/category" class="float-end btn btn-info">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('category.store') }}" , method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name"> Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your name" value="">
                            @if ($errors->first('name'))
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <div class="form-check mr-sm-2">
                                    <input type="checkbox" class="form-check-input" name="status" id="status"
                                        value="1" />
                                    <label class="form-check-label" for="customControlAutosizing1">Mark as
                                        active</label>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
