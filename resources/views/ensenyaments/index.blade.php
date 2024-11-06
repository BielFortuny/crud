@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1>{{ __("Llistat d'ensenyaments") }}</h1>
        <a href="{{ route("ensenyaments.create") }}" class="btn btn-primary">
            {{ __("Afegir ensenyament") }}
        </a>
        <a href="{{ route("home") }}" class="btn btn-light">
            {{ __("Tornar al menú de llistats") }}
        </a>
    </div>
    <table class="table table-bordered mb-5 mt-5">
        <thead>
            <tr class="table-success">
                <th>{{ __("Id") }}</th>
                <th>{{ __("Nom") }}</th>
                <th>{{ __("Accions") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ensenyaments as $ensenyament)
            <tr>
                <th scope="row">{{ $ensenyament->id }}</th>
                <td>{{ $ensenyament->nom }}</td>
                <td>
                    <a href="{{ route("ensenyaments.edit", ["ensenyament" => $ensenyament]) }}" class="btn btn-warning">{{ __("Editar") }}</a>
                    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-ensenyament-{{ $ensenyament->id }}-form').submit();">{{ __("Eliminar") }}</a>
                    <form id="delete-ensenyament-{{ $ensenyament->id }}-form" action="{{ route("ensenyaments.destroy", ["ensenyament" => $ensenyament]) }}" method="POST" class="hidden">
                        @method("DELETE")
                        @csrf
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">
                    <div class="text-center" role="alert">
                        <p><strong class="font-bold">{{ __("No hi ha ensenyaments") }}</strong></p>
                        <span>{{ __("No hi ha cap dada a mostrar") }}</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $ensenyaments->links() !!}
    </div>
</div>
@endsection
