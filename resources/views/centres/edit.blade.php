@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="w-full">
        <div class="flex flex-wrap">
            <h1 class="mb-5">{{ __("Editar Centre") }}</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('centres.update', $centre->id) }}" class="needs-validation">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">{{ __("Nom") }}</label>
            <input name="nom" type="text" class="form-control" value="{{ old('nom', $centre->nom) }}">
            @error("nom")
            <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">
                {{ __("Actualitzar") }}
            </button>
        </div>
        <div class="mb-3">
            <a href="{{ route('centres.index') }}" class="btn btn-light">{{ __("Tornar al llistat de centres") }}</a>
        </div>
    </form>
</div>
@endsection
