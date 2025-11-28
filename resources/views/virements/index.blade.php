@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Liste des Virements</h1>
    <a href="{{ route('virements.create') }}" class="btn btn-primary mb-3">Effectuer un virement</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Compte Émetteur</th>
                <th>Compte Bénéficiaire</th>
                <th>Montant</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($virements as $virement)
            <tr>
                <td>{{ $virement->id }}</td>
                
                {{-- CORRECTION : Utilisation de name et prenom --}}
                <td>
                    {{ $virement->compteEmetteur->RIB ?? '' }} 
                    ({{ $virement->compteEmetteur->user->name ?? '' }} {{ $virement->compteEmetteur->user->prenom ?? '' }})
                </td>
                
                {{-- CORRECTION : Utilisation de name et prenom, et de la bonne relation compteRecepteur --}}
                <td>
                    {{ $virement->compteRecepteur->RIB ?? '' }} 
                    ({{ $virement->compteRecepteur->user->name ?? '' }} {{ $virement->compteRecepteur->user->prenom ?? '' }})
                </td>
                
                <td>{{ number_format($virement->montant, 2) }}</td>
                <td>{{ $virement->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
