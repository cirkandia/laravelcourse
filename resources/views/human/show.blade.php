@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div
                        class="col-md-4 bg-primary rounded-start d-flex align-items-center justify-content-center text-white p-4">
                        <h1 class="display-1 m-0"><i class="bi bi-person-bounding-box"></i></h1>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">
                                {{ $viewData["human"]->getName() }}
                                @if($viewData["human"]->isLegendary())
                                    <span class="badge bg-warning text-dark fs-6 ms-2">Legendary!</span>
                                @endif
                            </h4>
                            <p class="card-text text-muted mb-4 d-flex align-items-center gap-2">
                                <span>Aura:</span>
                                <span
                                    class="fs-5 fw-bold {{ $viewData["human"]->isCommon() ? 'text-primary' : 'text-dark' }}">
                                    {{ $viewData["human"]->getAura() }}
                                </span>
                            </p>
                            <p class="card-text mb-4">
                                <span class="badge bg-secondary">{{ ucfirst($viewData["human"]->getCategory()) }}</span>
                            </p>

                            <div class="d-flex gap-2">
                                <a href="{{ route('humans.edit', $viewData["human"]->getId()) }}"
                                    class="btn btn-primary d-inline-block">{{ __('messages.humans_edit') }}</a>

                                <form action="{{ route('humans.destroy', $viewData["human"]->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('{{ __('messages.humans_delete_confirm') }}')">{{ __('messages.humans_delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('humans.index') }}"
                    class="btn btn-outline-secondary">{{ __('messages.back_to_list') }}</a>
            </div>
        </div>
    </div>
@endsection