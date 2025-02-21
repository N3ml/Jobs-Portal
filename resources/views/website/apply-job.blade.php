@extends('website.layouts.master')
@php
    use App\Enums\JobStatusEnum;
    use App\Enums\JobTypeEnum;
    use App\Enums\JobLocationEnum;
@endphp
@section('content')
    <!-- Left Content -->
    <div class="container mt-50 mb-30">
        <div class="row justify-content-between">

            <!-- Right Content -->
            <div class="col-xl-6 col-lg-4">
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
                        <li>Salary : <span>$7,800 yearly</span></li>
                        <li>Application date : <span>12 Sep 2020</span></li>
                    </ul>
                </div>
            </div>
            <!-- Right Content -->
            <div class="col-xl-6 col-lg-4">
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
                        <li>Salary : <span>$7,800 yearly</span></li>
                        <li>Application date : <span>12 Sep 2020</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="#" class="search-box">
            <div class="input-form">
                <input type="file" placeholder="Job Tittle or keyword">
            </div>
            <div class="search-form" type="submit">
                <a>
                    Send
                </a>
            </div>

        </form>
    </div>
@endsection
