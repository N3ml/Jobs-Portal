@extends('website.layouts.master')
@php use App\Enums\ApplicationStatusEnum; @endphp
@section('content')
    <!-- Left Content -->
    <div class="container mt-50 mb-30">
        <div class="row justify-content-between">
            <!-- Right Content -->
            <div class="col-xl-6 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>Applicant's Info</h4>
                    </div>
                    <ul>
                        <li>Name : <span>{{$application->user->name}}</span></li>
                        <li>Email : <span>{{$application->user->email}}</span></li>
                        <li>Address : <span>{{$application->address}}</span></li>
                        <li>Phone Number : <span>{{$application->phone}}</span></li>
                        <li>Application date : <span>{{date_format($application->created_at,'d-m-y')}}</span></li>
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
                        <li>Posted date : <span>{{date_format($application->job->created_at,'d-m-y')}}</span></li>
                        <li>Position : <span>{{$application->job->position->title}}</span></li>
                        <li>Location : <span>{{$application->job->location == 1 ? 'On Site' : 'Remote'  }}</span></li>
                        <li>Job nature : <span>{{$application->job->type == 1 ? 'Full Time':'Part Time'}}</span></li>
                        <li>Salary : <span>${{$application->job->salary}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>Resume</h4>
                    </div>
                    <a href="{{ asset('storage/' . $application->resume) }}" target="_blank" class="btn btn-primary">View Resume</a>
                </div>
            </div>
            <div class="col-6">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>Application Status</h4>
                    </div>
                    @if($application->status == ApplicationStatusEnum::PENDING->value)
                        <span class="text-warning">PENDING</span>
                    @elseif($application->status == ApplicationStatusEnum::APPROVED->value)
                        <span class="text-success">APPROVED</span>
                    @else
                        <span class="text-danger">REJECTED</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
