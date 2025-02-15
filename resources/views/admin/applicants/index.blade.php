@extends('admin.layouts.master')

@section('page_title', 'Applicants')

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
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($applicants as $applicant)
                    <tr>
{{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $applicants->perPage()) + $loop->iteration }}</td>
                        <td>{{ $applicant->name }}</td>
                        <td>

                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                            data-route="{{ route('admin.applicants.destroy', $applicant->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No applicants found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $applicants->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
