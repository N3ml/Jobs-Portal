@extends('admin.layouts.master')

@section('page_title', 'Positions')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Position</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('admin.positions.store') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="name" class="form-label">Description</label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
