@php use App\Enums\JobLocationEnum;use App\Enums\JobStatusEnum;use App\Enums\JobTypeEnum; @endphp
@extends('admin.layouts.master')

@section('page_title', 'Jobs')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Job</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('admin.jobs.store') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-3">
                    <label for="position_id" class="form-label">Position</label>
                    <select name="position_id" id="position_id"
                            class="form-control @error('position_id') is-invalid @enderror">
                        <option value="">Select Position</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->title }}</option>
                        @endforeach
                    </select>
                    @error('position_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="requirements" class="form-label">Requirements</label>
                    <textarea
                        class="form-control @error('requirements') is-invalid @enderror"
                        id="requirements"
                        name="requirements"></textarea>
                    @error('requirements')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" class="form-control @error('title') is-invalid @enderror" id="salary"
                           name="salary">
                    @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                        <option value="">Select Type</option>
                        <option value="{{ JobTypeEnum::FULLTIME->value }}">Full Time</option>
                        <option value="{{ JobTypeEnum::PARTTIME->value }}">Part Time</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="location" class="form-label">Location</label>
                    <select name="location" id="location" class="form-control @error('location') is-invalid @enderror">
                        <option value="">Select Location</option>
                        <option value="{{ JobLocationEnum::ONSITE->value }}">On Site</option>
                        <option value="{{ JobLocationEnum::REMOTE->value }}">Remote</option>
                    </select>
                    @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="{{ JobStatusEnum::OPENED->value }}">Open</option>
                        <option value="{{ JobStatusEnum::CLOSED->value }}">Close</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
