@extends('frontend.index')

@section('contents')
    {{-- latest News --}}
    <div class="py-3">
        <div class="container">
            <div class="row gy-4">
                @if (!empty($posts))
                    @foreach ($posts as $post)
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
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    {{-- latest News Ends --}}

    {{-- politics News --}}
    <div class="my-3">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-8">
                    <div class="row">
                        <!-- Heading -->
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-between py-2 px-3 bgdark mb-4 newsHeadingSection">
                                <span>
                                    <h5 class="fw-bold p-1">Politics</h5>
                                </span>
                                <span><a href="" class="scolor fw-bold ">More +</a></span>
                            </div>
                        </div>
                        <!-- Left Section -->
                        <div class="col-md-6">
                            <div class="row">
                                @foreach ($politics as $index => $post)
                                    @if ($index == 0)
                                        <div class="col-md-12">
                                            <a href="/news/{{ $post->id }}">
                                                <div class="card border-0 mb-3">
                                                    <div class="card-body p-0 text-center bgdark">
                                                        <img src="{{ asset($post->image) }}" class="img-fluid mb-3"
                                                            alt="">
                                                        <h5 class="fs-5 text-dark fw-semibold">{{ $post->title }}</h5>
                                                        <div class="scolor"> <i class=" far fa-clock me-1"></i>
                                                            <span>
                                                                @php
                                                                    $year = $post->created_at->format('Y');
                                                                    $month = $post->created_at->format('M');
                                                                    $day = $post->created_at->format('d');
                                                                    echo $month . ' ' . $year . ',' . $day;
                                                                @endphp

                                                            </span>
                                                        </div>
                                                        <p class="text-secondary fs-5"> {!! Str::limit($post->description, 150, ' ...') !!}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- Right Section -->
                        <div class="col-md-6">
                            <div class="row">
                                @foreach ($politics as $index => $post)
                                    @if ($index > 0)
                                        <div class="col-md-12 ">
                                            <a href="/news/{{ $post->id }}">
                                                <div class="d-flex">
                                                    <img src="{{ asset($post->image) }}" class="img-fluid pe-3"
                                                        width="30%" height="auto" alt="">
                                                        <div class="div">
                                                            <p class="fw-semibold mb-1">{{ $post->title }}</p>
                                                            <div class="text-secondary"> <i class=" far fa-clock me-1"></i>
                                                                <span>
                                                                    @php
                                                                        $year = $post->created_at->format('Y');
                                                                        $month = $post->created_at->format('M');
                                                                        $day = $post->created_at->format('d');
                                                                        echo $month . ' ' . $year . ',' . $day;
                                                                    @endphp

                                                                </span>
                                                            </div>
                                                        </div>
                                                </div>

                                            </a>

                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <!-- BREAKING NEWS SECTION -->
                {{-- @include('frontend.components.home.breakingnews') --}}

            </div>
        </div>
    </div>


    {{-- politics NewsEnds --}}

@endsection
