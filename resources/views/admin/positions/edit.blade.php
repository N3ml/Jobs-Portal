@extends('admin.layouts.master')

@section('page_title', 'Positions')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Position</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('admin.positions.update', $position->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           value="{{ $position->title }}"
                    >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="name" class="form-label">Description</label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description">{{$position->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
