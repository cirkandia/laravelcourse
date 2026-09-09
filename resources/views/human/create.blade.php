@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Registrar Humano</h5>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul class="alert alert-danger list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('humans.store') }}">
                        @csrf
                        @include('human._form')
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('humans.index') }}" class="btn btn-outline-secondary">Volver al listado</a>
                            <button type="submit" class="btn btn-success">Guardar Humano</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection