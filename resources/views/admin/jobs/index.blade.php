@extends('admin.layouts.master')

@section('page_title', 'Jobs')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Jobs</h3>
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.layouts.partials.flash_messages')
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($jobs as $job)
                    <tr>
{{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $jobs->perPage()) + $loop->iteration }}</td>
                        <td>{{ $job->position->title}}</td>
                        <td>{{ $job->status == 1 ? 'Open':'Close' }}</td>
                        <td>
                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-success btn-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                            data-route="{{ route('admin.jobs.destroy', $job->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No jobs found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $jobs->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
