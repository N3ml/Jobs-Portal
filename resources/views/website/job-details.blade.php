@extends('website.layouts.master')
@php
    use App\Enums\JobStatusEnum;
    use App\Enums\JobTypeEnum;
    use App\Enums\JobLocationEnum;
@endphp
@section('content')
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
{{--                            <div class="company-img company-img-details">--}}
{{--                                <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>--}}
{{--                            </div>--}}
                            <div class="job-tittle">
                                    <h4>{{$job->position->title}}</h4>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->location == JobLocationEnum::ONSITE->value ? 'On-Site' : 'Remote'}}</li>
                                    <li>${{$job->salary}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{$job->position->description}}</p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <p>{{$job->requirements}}</p>
                        </div>
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
                        <div class="apply-btn2">
                            <a href="{{route('website.apply-job',$job->id)}}" class="btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
