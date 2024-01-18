@extends('frontend.index')

@section('contents')
<div class="container-fluid mt-4 pt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 ">
                <div class="bg-light border p-4 mb-5 text-dark">

                    <h4 class="text-uppercase fw-bold mb-3">Login</h4>
                    <form action="{{ route('frontend.register') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control p-2" name="name" placeholder="Your name"
                                required="required" />
                                @if ($errors->first('name'))
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email address</label>
                            <input type="text" class="form-control p-2" name="email" placeholder="Your Email"
                                required="required" />
                                @if ($errors->first('email'))
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control p-2" name="password"
                                placeholder="Your Password" required="required" />
                                @if ($errors->first('password'))
                                <span style="color: red">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control p-2" name="address" placeholder="Your address"
                                required="required" />
                                @if ($errors->first('address'))
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control p-2" name="phone" placeholder="Your phone"
                                required="required" />
                                @if ($errors->first('phone'))
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div>
                            <button class="btn pcolorbtn-primary pcolor  text-white fw-semibold "
                                type="submit">Register</button>
                        </div>
                    </form>
                    <div class="mt-2">

                        <a href="{{ route('login.forget') }}" >Forgot Password?</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
