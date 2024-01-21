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


    <div class="container my-3">
        <div class="row gy-4">
            {{-- politics News --}}
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
                                        <a href="{{ route('postDetail', $post->slug) }}">
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
                                        <a href="{{ route('postDetail', $post->slug) }}">
                                            <div class="d-flex">
                                                <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                                    height="auto" alt="">
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
            {{-- Politics News Ends --}}

            {{-- Latest Updates Section --}}
            <div class="col-md-4 ">
                <div class="col-md-12 py-3 px-4 pcolor  ">
                    <a href="">
                        <h5 class="mb-0 text-white">Latest Updates</h5>
                    </a>
                </div>
                <div class="col-md-12 pt-4  lightblue px-2">
                    <div class="row">
                        @foreach ($latest as $post)
                            <div class="col-md-12 ">
                                <a href="{{ route('postDetail', $post->slug) }}">
                                    <div class="d-flex">
                                        <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                            height="30%" height="auto" alt="">
                                        <h5>{{ Str::limit($post->title, 80, '....') }}</h5>
                                    </div>
                                </a>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Latest Updates End --}}
        </div>
    </div>

    <!-- ENTERTAINMENT NEWS SECTION -->

    <div class="container my-3">
        <div class="row gy-4">
            {{-- politics News --}}
            <div class="col-md-8">
                <div class="row">
                    <!-- Heading -->
                    <div class="col-md-12 ">
                        <div class="d-flex justify-content-between py-2 px-3 bgdark mb-4 newsHeadingSection">
                            <span>
                                <h5 class="fw-bold p-1">Entertainment</h5>
                            </span>
                            <span><a href="" class="scolor fw-bold ">More +</a></span>
                        </div>
                    </div>
                    <!-- Left Section -->
                    <div class="col-md-6">
                        <div class="row">
                            @foreach ($entertainment as $index => $post)
                                @if ($index == 0)
                                    <div class="col-md-12">
                                        <a href="{{ route('postDetail', $post->slug) }}">
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
                            @foreach ($entertainment as $index => $post)
                                @if ($index > 0)
                                    <div class="col-md-12 ">
                                        <a href="{{ route('postDetail', $post->slug) }}">
                                            <div class="d-flex">
                                                <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                                    height="auto" alt="">
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
            {{-- Politics News Ends --}}

            {{-- Sidebar ads Section --}}
            <div class="col-md-4 px-3 ">
                <div class="col-md-12">
                    @if (!empty($sidebar_ads))
                        <a href="{{ $sidebar_ads->link }}" target="_blank">
                            <img src="{{ asset("/ads/$sidebar_ads->image") }}" width="100%" alt="">
                        </a>
                    @endif
                </div>
            </div>
            {{-- Sidebar ads End --}}
        </div>
    </div>

    <!-- ENTERTAINMENT NEWS SECTION ENDS -->


    <!-- INTERTNATIONAL NEWS SECTION -->
    <div class="container">
        <div class="row">
            <!-- Heading -->
            <div class="col-md-12 ">
                <div class="d-flex justify-content-between py-2 px-3 bgdark mb-4 newsHeadingSection">
                    <span>
                        <h5 class="fw-bold p-1">INTERNATIONAL</h5>
                    </span>
                    <span><a href="" class="scolor fw-bold ">More +</a></span>
                </div>
            </div>
            <!-- Left Section -->
            <div class="col-md-4">
                <div class="row">
                    @foreach ($international as $index => $post)
                        @if ($index == 0)
                            <div class="col-md-12">
                                <a href="{{ route('postDetail', $post->slug) }}">
                                    <div class="card border-0 mb-3">
                                        <div class="card-body p-0 text-center bgdark">
                                            <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                                            <h5 class="fs-5 textpcolor fw-semibold">{{ $post->title }}</h5>

                                            <p class="text-secondary fs-5"> {!! Str::limit($post->description, 250, ' ...') !!}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Middle Section -->
            <div class="col-md-4">
                <div class="row">
                    @foreach ($international as $index => $post)
                        @if ($index == 0)
                            <div class="col-md-12">
                                <a href="{{ route('postDetail', $post->slug) }}">
                                    <div class="card border-0 mb-3">
                                        <div class="card-body p-0 text-center bgdark">
                                            <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                                            <h5 class="fs-5 textpcolor fw-semibold">{{ $post->title }}</h5>

                                            <p class="text-secondary fs-5"> {!! Str::limit($post->description, 250, ' ...') !!}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Right Section -->
            <div class="col-md-4">
                <div class="row">
                    @foreach ($international as $index => $post)
                        @if ($index > 0)
                            <div class="col-md-12 ">
                                <a href="{{ route('postDetail', $post->slug) }}">
                                    <div class="d-flex">
                                        <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                            height="auto" alt="">
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
    <!-- ENTERTAINMENT NEWS SECTION ENDS -->

    <!-- Bottom ads -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-4">
                @if (!empty($bottom_ads))
                    <a href="{{ $bottom_ads->link }}" target="_blank">
                        <img src="{{ asset("/ads/$bottom_ads->image") }}" width="100%" alt="">
                    </a>
                @endif
            </div>
        </div>
    </div>
    <!--    OTHER CATEGORIES  -->
    <div class="container my-3">
        <div class="row gy-4">
            <!--   LITERATURE  -->
            <div class="col-md-4">
                <div class="d-flex justify-content-between py-2 px-3 bgdark mb-4 newsHeadingSection">
                   <h5 class="fw-bold p-1">Literature</h5>
                    <a href="" class="scolor fw-bold ">More +</a>
                </div>
                @foreach ($literature as $index => $post)
                    @if ($index == 0)
                        <div class="col-md-12">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <div class="card border-0 mb-3">
                                    <div class="card-body p-0 ">
                                        <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                                        <h5 class="fs-5 text-dark fw-semibold">{{ $post->title }}</h5>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        </div>

                    @elseif ($index > 0)
                        <div class="col-md-12 ">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <div class="d-flex">
                                    <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                        height="auto" alt="">

                                    <p class="fw-semibold textpcolor mb-1">{{ $post->title }}</p>


                                </div>


                            </a>

                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
            <!--   LITERATURE Ends  -->

            <!--   HEALTH/EDUCATION  -->
            <div class="col-md-4">
                <div class="d-flex justify-content-between py-2 px-3 bgdark mb-4 newsHeadingSection">
                   <h5 class="fw-bold p-1">Health/Education</h5>
                    <a href="" class="scolor fw-bold ">More +</a>
                </div>
                @foreach ($literature as $index => $post)
                    @if ($index == 0)
                        <div class="col-md-12">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <div class="card border-0 mb-3">
                                    <div class="card-body p-0 ">
                                        <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                                        <h5 class="fs-5 text-dark fw-semibold">{{ $post->title }}</h5>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        </div>

                    @elseif ($index > 0)
                        <div class="col-md-12 ">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <div class="d-flex">
                                    <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                        height="auto" alt="">

                                    <p class="fw-semibold textpcolor mb-1">{{ $post->title }}</p>


                                </div>


                            </a>

                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
            <!--   HEALTH/EDUCATION ENDS  -->

            <!--   BUSINESS  -->
            <div class="col-md-4">
                <div class="d-flex justify-content-between py-2 px-3 bgdark mb-4 newsHeadingSection">
                   <h5 class="fw-bold p-1">Business</h5>
                    <a href="" class="scolor fw-bold ">More +</a>
                </div>
                @foreach ($literature as $index => $post)
                    @if ($index == 0)
                        <div class="col-md-12">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <div class="card border-0 mb-3">
                                    <div class="card-body p-0 ">
                                        <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                                        <h5 class="fs-5 text-dark fw-semibold">{{ $post->title }}</h5>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        </div>

                    @elseif ($index > 0)
                        <div class="col-md-12 ">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <div class="d-flex">
                                    <img src="{{ asset($post->image) }}" class="img-fluid pe-3" width="30%"
                                        height="auto" alt="">

                                    <p class="fw-semibold textpcolor mb-1">{{ $post->title }}</p>


                                </div>


                            </a>

                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
            <!--    BUSINESS ENDS  -->
        </div>

    </div>
    <!--    OTHER CATEGORIES ENDS -->
@endsection
