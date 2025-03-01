@extends('website.layouts.master')

@section('content')
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto text-center">
                <h2 class="contact-title ">Register Now</h2>
            </div>
            <div class="col-lg-8 m-auto">
                <form class="form-contact contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                @error('name')
                                <span class="text-danger">
                                        {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-8 m-auto">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-8 m-auto">
                            <div class="form-group">
                                <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'" placeholder="Enter password">
                                @error('password')
                                <span class="text-danger">
                                        {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 m-auto">
                            <div class="form-group">
                                <input class="form-control" name="password_confirmation" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'" placeholder="Enter password">
                                @error('password_confirmation')
                                <span class="text-danger">
                                        {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-contactForm boxed-btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
