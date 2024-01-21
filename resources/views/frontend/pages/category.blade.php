@extends('frontend.index')

@section('contents')
    <div class="py-3">
        <div class="container">
            <div class="row gy-4">
                @foreach ($posts as $index => $post)
                    @if ($index < 2)
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="text-center">
                                <h1 class="display-5 fw-semibold py-3 ">
                                    <a href="{{ route('postDetail', $post->slug) }} "
                                        class="text-black fw-bold text-decoration-none">{{ $post->title }}</a>
                                </h1>
                                @if (!empty($post->sub_title))
                                    <h2 class="fw-semibold my-3 scolor ">{{ $post->sub_title }}</h2>
                                @endif
                                <a href="{{ route('postDetail', $post->slug) }}">
                                    <img src="{{ asset($post->image) }}" class="my-3" width="100%" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="col-md-4">
                            <div class="row">
                                <a href="{{ route('postDetail', $post->slug) }}">
                                    <div class="card border-0 mb-3">
                                        <div class="card-body p-0 ">
                                            <h5 class="fs-5  fw-semibold">{{ $post->title }}</h5>
                                            <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">

                                            <p class="textscolor"> {!! Str::limit($post->description, 250, ' ...') !!}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
