@extends('website.layouts.master')
@php
    use App\Enums\JobStatusEnum;
    use App\Enums\JobTypeEnum;
    use App\Enums\JobLocationEnum;
@endphp
@section('content')
{{--    <!-- Preloader Start -->--}}
{{--    <div id="preloader-active">--}}
{{--        <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--            <div class="preloader-inner position-relative">--}}
{{--                <div class="preloader-circle"></div>--}}
{{--                <div class="preloader-img pere-text">--}}
{{--                    <img src="{{ asset('website') }}/img/logo/logo.png" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center"
                    data-background="{{ asset('website') }}/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 m-auto">
                        <!-- form -->
                        <form action="#" class="search-box">
                            <div class="input-form">
                                <input type="text" placeholder="Job Tittle or keyword">
                            </div>
                            <div class="search-form">
                                <a href="#">Find job</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <!-- single-job-content -->
                        @if(count($jobs)>0)
                            @foreach($jobs as $job)
                                <div class="single-job-items mb-10">
                                    <div class="job-items">
                                        {{--                                <div class="company-img">--}}
                                        {{--                                    <a href="job_details.html"><img src="{{ asset('website') }}/img/icon/job-list1.png" alt=""></a>--}}
                                        {{--                                </div>--}}
                                        <div class="job-tittle">
                                            <a href="{{route('website.job-details',$job->id)}}">
                                                <h4>{{$job->position->title}}</h4>
                                            </a>
                                            <ul>
{{--                                                <li>{{$job->position->description}}</li>--}}
                                                <li><i class="fas fa-map-marker-alt"></i>{{$job->location == JobLocationEnum::ONSITE->value ? 'On-Site' : 'Remote'}}</li>
                                                <li>${{$job->salary}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link f-right">
                                        <a href="{{route('website.job-details',$job->id)}}">{{$job->type == JobTypeEnum::PARTTIME->value ? 'Part Time' : 'Full Time'}}</a>
{{--                                        <span>7 hours ago</span>--}}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{$jobs->links()}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150" data-background="{{ asset('website') }}/img/gallery/how-applybg.png">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span>Apply process</span>
                            <h2> How it works</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                                <h5>1. Search a job</h5>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                    laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                                <h5>2. Apply for job</h5>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                    laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                                <h5>3. Get your job</h5>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                    laborea.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- How  Apply Process End-->

    </main>
@endsection
