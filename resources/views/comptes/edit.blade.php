@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Compte</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('comptes.update', $compte) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>RIB</label>
            <input type="text" name="rib" class="form-control" value="{{ old('rib', $compte->rib) }}" required>
        </div>
        <div class="mb-3">
            <label>Solde</label>
            <input type="number" name="solde" class="form-control" value="{{ old('solde', $compte->solde) }}" min="0" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Client</label>
            <select name="user_id" class="form-select" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $compte->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('comptes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection