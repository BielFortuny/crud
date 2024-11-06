<div class="w-full">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>
<form method="POST" action="{{ $route }}" class="needs-validation">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="mb-3">
        <label for="nom" class="form-label">{{ __("Nom") }}</label>
        <input name="nom" type="text" class="form-control" value="{{ old("nom") ?? $alumne->nom }}">
        @error("nom")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cognoms" class="form-label">{{ __("Cognoms") }}</label>
        <input name="cognoms" type="text" class="form-control" value="{{ old("cognoms") ?? $alumne->cognoms }}">
        @error("cognoms")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="data_naixement" class="form-label">{{ __("Data de naixement") }}</label>
        <input name="data_naixement" type="date" class="form-control" value="{{ old("data_naixement") ?? $alumne->data_naixement }}">
        @error("data_naixement")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="centre_id" class="form-label">{{ __("Centre") }}</label>
        <select class="form-select" name="centre_id" value="{{ old("centre_id") ?? $alumne->centre_id }}">
            @foreach ($centres as $centre)
                <option value="{{ $centre->id }}" {{ $centre->id == $alumne->centre_id ? 'selected' : '' }}>{{ $centre->nom }}</option>
            @endforeach
        </select>
        @error("centre_id")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="ensenyament_id" class="form-label">{{ __("Ensenyament") }}</label>
        <select class="form-select" name="ensenyament_id" value="{{ old("ensenyament_id") ?? $alumne->ensenyament_id }}">
            @foreach ($ensenyaments as $ensenyament)
                <option value="{{ $ensenyament->id }}" {{ $ensenyament->id == $alumne->ensenyament_id ? 'selected' : '' }}>{{ $ensenyament->nom }}</option>
            @endforeach
        </select>
        @error("ensenyament_id")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            {{ $textButton }}
        </button>
    </div>
    <div class="mb-3">
        <a href="{{ route('alumne.index') }}" class="btn btn-light">{{ __("Tornar al llistat dels alumnes") }}</a>
    </div>
</form>
