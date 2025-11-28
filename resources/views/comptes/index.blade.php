@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Comptes</h1>
    <a href="{{ route('comptes.create') }}" class="btn btn-primary mb-3">Ajouter un compte</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>RIB</th>
                <th>Solde</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comptes as $compte)
            <tr>
                <td>{{ $compte->id }}</td>
                <td>{{ $compte->rib }}</td>
                <td>{{ $compte->solde }}</td>
                <td>
                    {{ $compte->user->nom ?? '-' }} {{ $compte->user->prenom ?? '' }}
                </td>
                <td>
                    <a href="{{ route('comptes.show', $compte) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('comptes.edit', $compte) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('comptes.destroy', $compte) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer ce compte ?')" class="btn btn-dark btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection