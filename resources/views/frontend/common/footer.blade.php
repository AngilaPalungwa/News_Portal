<div class="container-fluid footerColor py-5">

    <div class="container ">
        <div class="row d-flex ">
            <div class="col-md-4 px-4">
                <div class="card rounded-0 p-3 ">
                    <div class="card-body  text-center ">
                        <img src="{{ asset("/uploads/$company->logo") }}" width="100%" alt="" class="mb-2">
                        <p class="text-secondary ">{{ $company->aboutus }}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 px-4">
                <div class="card-fluid rounded-0 p-3 ">
                    <h4 class="card-title text-center fw-bold text-white"> Useful Link</h4>
                    <hr>
                    <div class="card-body  text-center text-white">
                        @foreach ($categories as $index => $category)
                        @if ($index<=6)
                        <p >
                            <a class="nav-link active  text-white" aria-current="page"
                            href="{{ route("categoryPage",$category->slug) }}">{{ $category->name }}</a>
                        </p>
                        @endif
                    @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-4 px-4">
                <div class="card-fluid rounded-0 p-3 ">
                    <h4 class="card-title text-center fw-bold text-white">Contact Us</h4>
                    <hr>
                    <div class="card-body  text-center text-white ">
                        <p >Address: {{ $company->address }}</p>
                        <p >Email: {{ $company->email }}</p>
                        <p >Phone: {{ $company->contact }}</p>
                        <p >For Advertisement</p>
                        <p >Phone: {{ $company->contact}}</p>
                        <form method="post" action="{{ route('subscriber') }}">
                            @csrf
                            <input type="email" name="email" placeholder="Enter your Email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- copyrightSection -->
<div class="copyrightSection pcolor">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-white ">
                <p class="my-2">Copyright &copy; <a href="#" class="text-decoration-none text-white">{{ $company->name }}.com</a> - All Rights Reserved.</p>
            </div><!-- End of col-md-12 -->
        </div><!-- End of row -->
    </div><!-- Endof container -->
</div><!-- End of copyrightSection -->
