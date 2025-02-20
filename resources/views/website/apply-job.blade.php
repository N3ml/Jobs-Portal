@extends('website.layouts.master')
@php
    use App\Enums\JobStatusEnum;
    use App\Enums\JobTypeEnum;
    use App\Enums\JobLocationEnum;
@endphp
@section('content')
    <!-- Left Content -->
    <div class="col-xl-7 col-lg-8">

        <!-- job single -->
        <div class="single-job">
            <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                </div>
            </form>

        </div>

    </div>
    <!-- Right Content -->
    <div class="col-xl-4 col-lg-4">
        <div class="post-details3  mb-50">
            <!-- Small Section Tittle -->
            <div class="small-section-tittle">
                <h4>Job Overview</h4>
            </div>
            <ul>
                <li>Posted date : <span>12 Aug 2019</span></li>
                <li>Location : <span>New York</span></li>
                <li>Vacancy : <span>02</span></li>
                <li>Job nature : <span>Full time</span></li>
                <li>Salary :  <span>$7,800 yearly</span></li>
                <li>Application date : <span>12 Sep 2020</span></li>
            </ul>
        </div>
    </div>
@endsection
