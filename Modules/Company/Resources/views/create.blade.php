@extends('backend.layout.master')
{{-- @section('title', 'System Setting') --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card-header my-4 ">
                    <span class="fs-4 fw-bold "> Company</span>
                </div>
                <div class="card-body">

                    <form action="{{ route('company.store') }}" , method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your name" value="">
                            @if ($errors->first('name'))
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter your email" value="">
                            @if ($errors->first('email'))
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Enter your address" value="">
                            @if ($errors->first('address'))
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact <span class="text-danger">*</span></label>
                            <input type="text" name="contact" id="contact" class="form-control"
                                placeholder="Enter your contact" value="">
                            @if ($errors->first('contact'))
                                <span style="color: red">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control"
                                placeholder="Enter your facebook" value="">
                            @if ($errors->first('facebook'))
                                <span style="color: red">{{ $errors->first('facebook') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="">Linkedin</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control"
                                placeholder="Enter your linkedin" value="">
                            @if ($errors->first('linkedin'))
                                <span style="color: red">{{ $errors->first('linkedin') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="">Youtube</label>
                            <input type="text" name="youtube" id="youtube" class="form-control"
                                placeholder="Enter your youtube" value="">
                            @if ($errors->first('youtube'))
                                <span style="color: red">{{ $errors->first('youtube') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control"
                                placeholder="Enter your twitter" value="">
                            @if ($errors->first('twitter'))
                                <span style="color: red">{{ $errors->first('twitter') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="aboutus"> About us</label>
                            <textarea name="aboutus" id="editor" cols="30" rows="10"></textarea>
                            @if ($errors->first('aboutus'))
                                <span style="color: red">{{ $errors->first('aboutus') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo" placeholder="logo" name="logo"
                                 value="">
                            @if ($errors->first('logo'))
                                <span style="color: red">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Add Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
