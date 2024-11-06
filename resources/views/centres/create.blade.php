@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="w-full">
        <div class="flex flex-wrap">
            <h1 class="mb-5">{{ __("Afegir Centre") }}</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('centres.store') }}" class="needs-validation">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">{{ __("Nom") }}</label>
            <input name="nom" type="text" class="form-control" value="{{ old('nom') }}">
            @error("nom")
            <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">
                {{ __("Afegir") }}
            </button>
        </div>
        <div class="mb-3">
            <a href="{{ route('centres.index') }}" class="btn btn-light">{{ __("Tornar al llistat de centres") }}</a>
        </div>
    </form>
</div>
@endsection
