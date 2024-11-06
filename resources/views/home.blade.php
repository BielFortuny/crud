@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Benvingut, ') . Auth::user()->name . '!' }}
                    <div class="container text-center mt-5">
                        <div class="row mb-3">
                            <div class="col">
                                <a href="{{ url('alumne') }}" class="btn btn-outline-primary btn-lg">📚 Llistat d'alumnes</a>
                            </div>
                            <div class="col">
                                <a href="{{ url('centres') }}" class="btn btn-outline-primary btn-lg">🏫 Llistat de centres</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="{{ url('ensenyaments') }}" class="btn btn-outline-primary btn-lg">📘 Llistat d'ensenyaments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
