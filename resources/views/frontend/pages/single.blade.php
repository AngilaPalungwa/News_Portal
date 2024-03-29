@extends('frontend.index')

@section('contents')
    <div>
        <div class="container">
            <div class="row">
                <!-- LEFT SECTION -->
                <div class="col-md-8">

                    <h1 class="display-5 fw-semibold py-3 "><a href=""
                            class="text-black fw-bold text-decoration-none">{{ $post->title }} </a></h1>
                    @if (!empty($post->sub_title))
                        <h3 class="fw-semibold text-secondary">{{ $post->sub_title }}</h3>
                    @endif
                    <hr>
                    <ul class="list-unstyled ">
                        <li class="list-inline-item me-3">
                            <i class=" far fa-clock me-1"></i><span>
                                @php
                                    $year = $post->created_at->format('Y');
                                    $month = $post->created_at->format('M');
                                    $day = $post->created_at->format('d');
                                    echo $month . ' ' . $year . ',' . $day;
                                @endphp
                            </span>
                        </li>
                        <li class="list-inline-item">
                            <i class="far fa-newspaper me-1"></i><span>Read {{ $post->views }} times</span>
                        </li>
                    </ul>
                    <img src="{{ asset($post->image) }}" class="my-3" width="100%" alt="">
                    <div class="fs-5"> {!! $post->description !!}</div>
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                        data-width="" data-numposts="5"></div>
                </div>


                <div class="col-md-4 p-3 ">
                    <div class="col-md-12">
                        @if (!empty($sidebar_ads))
                            <a href="{{ $sidebar_ads->link }}" target="_blank">
                                <img src="{{ asset("/ads/$sidebar_ads->image") }}" width="100%" alt="">
                            </a>
                        @endif
                    </div>



                    <div class="my-4">
                        <div class="col-md-12 py-3 px-4 pcolor  ">
                            <a href="">
                                <h5 class="mb-0 text-white">Latest Updates</h5>
                            </a>
                        </div>
                        <div class="col-md-12 pt-4  lightblue px-2">
                            <div class="row">
                                @foreach ($latest as $post)
                                    <div class="col-md-12 ">
                                        <div class="d-flex">
                                            <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                                height="30%" height="auto" alt="">
                                            <h5>{{ Str::limit($post->title, 110, '....') }}</h5>
                                        </div>

                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Header Section -->
                </div>
            </div>
        </div>
    </div>
@endsection
