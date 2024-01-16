@extends('backend.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header ">
                    <span class="fs-4 fw-bold">Edit Post</span>
                    <a href="/{{ route('post.index') }}" class="float-end btn btn-info">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('post.update',$post->id) }}" , method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name"> Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter your title" value="{{ $post->title }}">
                            @if ($errors->first('title'))
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Sub Title</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control"
                                placeholder="Enter Sub Title" value="{{ $post->sub_title }}">
                            @if ($errors->first('sub_title'))
                                <span style="color: red">{{ $errors->first('sub_title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category_name"> Category <span class="text-danger">*</span></label>

                            <select name="category_id[]" id="category_id" class="form-select form-control select2"  multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('cateogry'))
                            <span style="color: red">{{ $errors->first('cateogry') }}</span>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control"
                                accept="images/jpeg, images/jpg, images/png" placeholder="Enter Title">
                            @if ($errors->first('image'))
                                <span style="color: red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="editor" rows="3">{{ $post->description }}</textarea>
                            @if ($errors->first('description'))
                                <span style="color: red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-info">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- CK editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    {{-- select2
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        // $(document).ready(function() {
        //     $('.select2').select2({
        //         theme: 'classic',
        //         placeholder: "Select Category"
        //     });
        //     $(".").select2({
        //         width: 'resolve' // need to override the changed default
        //     });

        // });
    </script> --}}
@endsection
