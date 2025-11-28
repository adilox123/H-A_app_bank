@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Effectuer un Virement</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('virements.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Compte Émetteur</label>
            <select name="compte_emetteur_id" class="form-select" required>
                <option value="">-- Sélectionner un compte --</option>
                {{-- Affichage du nom de la personne et du solde --}}
                @foreach($comptes as $compte)
                    <option value="{{ $compte->id }}">
                        {{ $compte->user->name ?? 'Nom inconnu' }} (Solde: {{ $compte->solde }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Compte Bénéficiaire</label>
            <select name='compte_recepteur_id' class="form-select" required>
                <option value="">-- Sélectionner un compte --</option>
                {{-- Affichage seulement du nom de la personne --}}
                @foreach($comptes as $compte)
                    <option value="{{ $compte->id }}">
                        {{ $compte->user->name ?? 'Nom inconnu' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Montant</label>
            <input type="number" name="montant" class="form-control" min="1" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Effectuer le virement</button>
    </form>
</div>
@endsection