@php use App\Enums\ApplicationStatusEnum; @endphp
@extends('admin.layouts.master')

@section('page_title', 'Applications')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Applicants</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.layouts.partials.flash_messages')
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Applicant</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($applications as $application)
                    <tr>
                        {{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $applications->perPage()) + $loop->iteration }}</td>
                        <td>{{ $application->user->name }}</td>
                        <td>
                            @if($application->status == ApplicationStatusEnum::PENDING->value)
                                <span class="text-warning">PENDING</span>
                            @elseif($application->status == ApplicationStatusEnum::APPROVED->value)
                                <span class="text-success">APPROVED</span>
                            @else
                                <span class="text-danger">REJECTED</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.applications.show', $application->id) }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                                    data-route="{{ route('admin.applications.destroy', $application->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No applications found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $applications->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
