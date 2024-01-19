
@extends('backend.layout.master')

@section('content')
<div class="container ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card-header mb-3 ">
                <span class="fs-4 fw-bold">Create New Ads</span>
            </div>
            <div class="card-body">

                <form action="{{ route('ads.store') }}" , method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="company">Compnay Name</label>
                        <input type="text" name="company" id="company" class="form-control"
                            placeholder="Enter Company Name">
                            @if($errors->first('company'))
                            <span style="color: red">{{ $errors->first('company') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ads_category">Select Ads Type</label>
                        <select id="ads_category" class="form-control" name="ads_category">
                            <option value="header_ads">Header Ads (1900 x 300)</option>
                            <option value="topbar_ads">Topbar Ads (1400 X 150)</option>
                            <option value="sidebar_ads">Sidebar Ads (500 x 500)</option>
                        </select>
                        @if($errors->first('ads_category'))
                        <span style="color: red">{{ $errors->first('ads_category') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Select Image">
                            @if($errors->first('image'))
                            <span style="color: red">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="link">Ads Url</label>
                        <input type="text" name="link" id="link" class="form-control"
                            placeholder="Enter Ads Type">
                            @if($errors->first('link'))
                            <span style="color: red">{{ $errors->first('link') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-info">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
