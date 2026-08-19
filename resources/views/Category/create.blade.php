@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>
                <div class="card-body">
                    @if($errors->any())
                        <ul class="alert alert-danger list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('category.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" />
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="status" id="status" checked value="1">
                            <label class="form-check-label" for="status">Active Status</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection