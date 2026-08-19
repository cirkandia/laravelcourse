@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="{{ route('category.create') }}" class="btn btn-success">Create Category</a>
        </div>
    </div>
    <div class="row">
        @foreach ($viewData["categories"] as $category)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('category.show', ['id' => $category->getId()]) }}"
                            class="btn bg-primary text-white">{{ strtoupper($category->getName()) }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection