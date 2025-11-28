@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Ajouter un Compte</h1>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('comptes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="rib" class="form-label">RIB</label>
        <input type="text" name="rib" id="rib" class="form-control" value="{{ old('rib') }}" required>
    </div>

    <div class="mb-3">
        <label for="solde" class="form-label">Solde</label>
        <input type="number" name="solde" id="solde" class="form-control" value="{{ old('solde', 0) }}" min="0" step="0.01" required>
    </div>

    <div class="mb-3">
        <label for="user_id" class="form-label">Client</label>
        <select name="user_id" id="user_id" class="form-select" required>
            <option value="">-- Sélectionner un client --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ old('user_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Enregistrer</button>
    <a href="{{ route('comptes.index') }}" class="btn btn-secondary">Annuler</a>
</form>


</div>
@endsection
