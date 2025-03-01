@php use App\Enums\ApplicationStatusEnum; @endphp
@extends('admin.layouts.master')

@section('page_title', 'Application')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
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
                        <form action="{{ route('admin.applications.update', $application->id) }}" method="POST" class="row mb-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-6">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="{{ ApplicationStatusEnum::PENDING->value }}"
                                            @if($application->status == ApplicationStatusEnum::PENDING->value) selected @endif>
                                        PENDING
                                    </option>
                                    <option value="{{ ApplicationStatusEnum::APPROVED->value }}"
                                            @if($application->status == ApplicationStatusEnum::APPROVED->value) selected @endif>
                                        APPROVED
                                    </option>
                                    <option value="{{ ApplicationStatusEnum::REJECTED->value }}"
                                            @if($application->status == ApplicationStatusEnum::REJECTED->value) selected @endif>
                                        REJECTED
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Back</a>
        </div>
@endsection
