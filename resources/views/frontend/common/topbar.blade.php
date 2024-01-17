<div class="container-fluid topcolor">
    <div class="container  d-flex  justify-content-between">
        <div>
            <nav class="navbar p-0">
                <ul class="navbar-nav p-0 ">
                    <li>
                        <iframe scrolling="no" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true"
                            src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=333333&aj_time=yes&font_size=14&line_brake=0&api=822163m095"
                            width="334" height="22" font_color=fff ></iframe>
                    </li>
                    {{-- <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-white p-0 " href="#">{{ \Carbon\Carbon::parse(now())->format('D, M d, Y') }}</a>
                    </li> --}}

                    {{-- @if (!Auth::check())

                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{ route('frontend.register') }}">Register</a>
                    </li>
                    @endif
                    @if (Auth::check())
                    <li class="nav-item nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#"> Welcome, {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{ route('logout') }}">Logout</a>
                    </li>


                    @endif --}}



                </ul>
            </nav>
        </div>
        <div class=" text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm p-0">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link py-0 text-white" href="{{ $company->twitter }}" target="blank"><small
                                class="fab fa-twitter"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-0 text-white" href="{{ $company->facebook }}" target="blank"><small
                                class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-0 text-white" href="{{ $company->linkedin }}" target="blank"><small
                                class="fab fa-linkedin-in"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-0 text-white" href="{{ $company->youtube }}" target="blank"><small
                                class="fab fa-youtube"></small></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
