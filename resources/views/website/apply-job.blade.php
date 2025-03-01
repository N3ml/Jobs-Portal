@extends('website.layouts.master')

@section('content')
<!-- Left Content -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto text-center">
                <h2 class="contact-title ">Fill Your Application</h2>
            </div>
            <div class="col-lg-8 m-auto">
                <form class="form-contact contact_form" action="{{route('website.submit-apply-job',$job->id)}}" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" value="{{auth()->user()->name}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" value="{{auth()->user()->email}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 m-auto">
                            <div class="form-group">
                                <input class="form-control" name="phone" id="phone" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" placeholder="Phone Number">
                                @error('phone')
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
                                <input class="form-control" name="address" id="address" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Address'" placeholder="Your Address">
                                @error('address')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 m-auto">
                            <div class="small-section-tittle">
                                <h4>Upload Your Resume</h4>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="resume" id="resume" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Upload Your Resume'" placeholder="Upload Your Resume">
                                @error('resume')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-contactForm boxed-btn">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
