@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Compte</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID :</strong> {{ $compte->id }}</p>
            <p><strong>RIB :</strong> {{ $compte->RIB }}</p>
            <p><strong>Solde :</strong> {{ $compte->solde }}</p>
            <p><strong>Client :</strong> {{ $compte->client->nom }} {{ $compte->client->prenom }}</p>
        </div>
    </div>
    <a href="{{ route('comptes.index') }}" class="btn btn-primary mt-3">Retour</a>
</div>
@endsection