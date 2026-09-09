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
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                                placeholder="Ej: Nicolas Maduro" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Aura</label>
                            <input type="number" class="form-control" name="aura" value="{{ old('aura', 1) }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Categoría Jerárquica</label>
                            <select class="form-select" name="categoria" required>
                                <option value="" disabled {{ old('categoria') ? '' : 'selected' }}>Selecciona una
                                    categoría...</option>
                                <option value="común" {{ old('categoria') == 'común' ? 'selected' : '' }}>Común</option>
                                <option value="moderado" {{ old('categoria') == 'moderado' ? 'selected' : '' }}>Moderado
                                </option>
                                <option value="legendario" {{ old('categoria') == 'legendario' ? 'selected' : '' }}>Legendario
                                </option>
                            </select>
                        </div>

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
