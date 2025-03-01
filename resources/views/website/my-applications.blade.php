@extends('website.layouts.master')
@php
    use App\Enums\ApplicationStatusEnum;
    use App\Enums\JobTypeEnum;
    use App\Enums\JobLocationEnum;
@endphp
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="section-tittle text-center">
                <h2>My Applications</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <!-- single-job-content -->
            @if(count($applications)>0)
                @foreach($applications as $application)
                    <div class="single-job-items mb-10 row">
                        <div class="job-items col-9">
                            <div class="job-tittle">
                                <a href="{{route('website.application',$application->id)}}">
                                    <h4>{{$application->job->position->title}}</h4>
                                </a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$application->job->location == JobLocationEnum::ONSITE->value ? 'On-Site' : 'Remote'}}</li>
                                    <li>${{$application->job->salary}}</li>
                                    <li>{{$application->job->type == JobTypeEnum::PARTTIME->value ? 'Part Time' : 'Full Time'}}</li>
                                    <li>{{$application->status == ApplicationStatusEnum::APPROVED->value ? 'Approved' : 'Pending'}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="job-btn col-3">
                                <a class="genric-btn primary-border radius" href="{{route('website.application',$application->id)}}">View</a>
                                <a class="genric-btn danger-border radius" href="{{Route('website.cancel-application',$application->id)}}">Cansel</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
