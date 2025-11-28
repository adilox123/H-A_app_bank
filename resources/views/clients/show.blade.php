    @extends('layouts.app')

    @section('content')

    <style>
    /* ===== Container général ===== */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        font-family: 'Nunito', sans-serif;
    }

    /* ===== Card général ===== */
    .card {
        border-radius: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
    }

    /* ===== Header bienvenue ===== */
    .card-body h3 {
        font-size: 1.8rem;
        color: #2c3e50;
    }

    .card-body p {
        font-size: 1rem;
        color: #7f8c8d;
    }

    .badge {
        border-radius: 12px;
        font-weight: 600;
        background: linear-gradient(45deg, #f39c12, #e67e22);
        color: white;
        font-size: 0.95rem;
    }

    /* ===== Solde total ===== */
    .card-body h5 {
        font-size: 1.2rem;
        color: #34495e;
    }

    .card-body h4 {
        font-size: 1.8rem;
        color: #1abc9c;
        background: linear-gradient(90deg, #1abc9c, #16a085);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* ===== Comptes bancaires ===== */
    .card-header {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        background-color: #34495e;
        color: #fff;
        font-weight: 600;
    }

    /* Type de compte avec badge coloré */
    .type-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 12px;
        font-weight: 600;
        color: #fff;
        font-size: 0.85rem;
    }

    .type-courant { background-color: #3498db; }
    .type-epargne { background-color: #27ae60; }
    .type-autre { background-color: #9b59b6; }

    /* Solde couleur dynamique */
    .text-danger { color: #e74c3c !important; }
    .text-warning { color: #f39c12 !important; }
    .text-success { color: #2ecc71 !important; }

    /* Transactions */
    .list-group-item {
        border: none;
        padding: 8px 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px;
        margin-bottom: 4px;
        background: #f7f7f7;
        transition: background 0.3s;
    }

    .list-group-item:hover {
        background: #eaeaea;
    }

    .list-group-item span:first-child::before {
        content: '• ';
        font-weight: bold;
    }

    /* Date mise à jour */
    small.text-muted {
        font-size: 0.8rem;
        color: #95a5a6;
    }

    @media (max-width: 767px) {
        .card-body h3 { font-size: 1.5rem; }
        .card-body h4 { font-size: 1.4rem; }
        .list-group-item { font-size: 0.85rem; }
    }
    </style>

    <div class="container mt-4">

        {{-- Header bienvenue --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h3 class="mb-1">👋 Bienvenue, {{ Auth::user()->name }} {{ Auth::user()->prenom }}</h3>
                    <p class="text-muted mb-0">Voici un aperçu complet de vos comptes bancaires.</p>
                </div>
                <span class="badge p-3 fs-6 mt-2">
                    Code client : {{ Auth::id() }}
                </span>
            </div>
        </div>

        {{-- Solde total --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Total de vos comptes :</h5>
                <h4 class="fw-bold">
                    {{ number_format($comptes->sum('solde'), 2, ',', ' ') }} MAD
                </h4>
            </div>
        </div>

        {{-- Comptes bancaires --}}
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">💰 Vos Comptes Bancaires</h5>
            </div>
            <div class="card-body">

                @if($comptes->isEmpty())
                    <div class="alert alert-info">
                        Vous n'avez aucun compte bancaire pour le moment.
                    </div>
                @else

                <div class="row">
                    @foreach($comptes as $compte)
                    <div class="col-md-6 mb-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">

                                {{-- RIB --}}
                                <h6 class="text-muted">RIB</h6>
                                <p class="fs-5 fw-bold">{{ $compte->rib }}</p>

                                {{-- Type de compte --}}
                                <h6 class="text-muted">Type de compte</h6>
                                <p>
                                    @if($compte->type == 'Courant')
                                        <span class="type-badge type-courant">💳 Courant</span>
                                    @elseif($compte->type == 'Epargne')
                                        <span class="type-badge type-epargne">🏦 Épargne</span>
                                    @else
                                        <span class="type-badge type-autre">{{ $compte->type ?? 'Standard' }}</span>
                                    @endif
                                </p>

                                {{-- Solde --}}
                                <h6 class="text-muted">Solde actuel</h6>
                                <p class="fs-4 fw-bold
                                    @if($compte->solde < 0)
                                        text-danger
                                    @elseif($compte->solde < 100)
                                        text-warning
                                    @else
                                        text-success
                                    @endif">
                                    {{ number_format($compte->solde, 2, ',', ' ') }} MAD
                                </p>

                                {{-- Transactions (debug fix) --}}
                                @php
                                    $transactions = $compte->transactions();
                                @endphp

                                @if($transactions->isNotEmpty())
                                    <h6 class="text-muted mt-3">Dernières transactions</h6>
                                    <ul class="list-group list-group-flush">
                                        @foreach($transactions->take(3) as $tx)
                                            <li class="list-group-item">
                                                <span>{{ $tx->description }}</span>
                                                <span class="{{ $tx->montant < 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ number_format($tx->montant, 2, ',', ' ') }} MAD
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                {{-- Date mise à jour --}}
                                <small class="text-muted d-block mt-2">
                                    Dernière mise à jour : {{ $compte->updated_at->format('d/m/Y H:i') }}
                                </small>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @endif

            </div>
        </div>

    </div>
    @endsection
