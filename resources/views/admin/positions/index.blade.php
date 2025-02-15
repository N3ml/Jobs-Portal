@extends('admin.layouts.master')

@section('page_title', 'Positions')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Positions</h3>
            <a href="{{ route('admin.positions.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.layouts.partials.flash_messages')
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($positions as $position)
                    <tr>
{{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $positions->perPage()) + $loop->iteration }}</td>
                        <td>{{ $position->title }}</td>
                        <td>
                            <a href="{{ route('admin.positions.edit', $position->id) }}" class="btn btn-success btn-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                            data-route="{{ route('admin.positions.destroy', $position->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No positions found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $positions->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
