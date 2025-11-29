@extends('layouts.app')

@section('content')

<style>
    :root {
        --primary: #1a5f7a;
        --primary-dark: #144d63;
        --primary-light: #57a6c7;
        --accent: #ff9a3c;
        --accent-dark: #e87c1c;
        --success: #27ae60;
        --warning: #f39c12;
        --danger: #e74c3c;
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        --gradient-accent: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
        --gradient-success: linear-gradient(135deg, #27ae60, #219653);
        --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 8px 25px rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 15px 40px rgba(0, 0, 0, 0.2);
        --border-radius: 16px;
        --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* STRUCTURE PRINCIPALE */
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    /* ANIMATIONS PROFESSIONNELLES */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* SECTION 1: HEADER DE BIENVENUE */
    .welcome-section {
        background: var(--gradient-primary);
        color: white;
        border-radius: var(--border-radius);
        padding: 2.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }

    .welcome-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .welcome-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .welcome-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .client-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        font-size: 0.95rem;
        position: relative;
        z-index: 2;
    }

    /* SECTION 2: SOLDE GLOBAL */
    .balance-section {
        background: var(--gradient-primary);
        color: white;
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        animation: slideInLeft 0.8s ease-out 0.2s both;
        position: relative;
        overflow: hidden;
    }

    .balance-section::before {
        content: '💰';
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 3rem;
        opacity: 0.2;
    }

    .balance-label {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .balance-amount {
        font-family: 'Inter', sans-serif;
        font-size: 3rem;
        font-weight: 700;
        background: linear-gradient(135deg, #ffffff, #e3f2fd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* SECTION 3: COMPTES BANCAIRES */
    .accounts-section {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .section-header {
        background: var(--gradient-primary);
        color: white;
        padding: 1.5rem 2rem;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-content {
        padding: 2rem;
    }

    /* COMPOSANTS DE COMPTE */
    .account-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .account-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 2rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        animation: fadeInUp 0.8s ease-out;
    }

    .account-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    /* EN-TÊTE DU COMPTE */
    .account-header {
        display: flex;
        justify-content: between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .account-info {
        flex: 1;
    }

    .account-rib {
        font-family: 'Courier New', monospace;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-dark);
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .account-type {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
        color: white;
    }

    .type-courant {
        background: var(--gradient-primary);
    }

    .type-epargne {
        background: var(--gradient-success);
    }

    .type-autre {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
    }

    /* SOLDE DU COMPTE */
    .account-balance-section {
        margin: 1.5rem 0;
        padding: 1rem 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .balance-label-small {
        font-size: 0.9rem;
        color: #718096;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .balance-amount-large {
        font-family: 'Inter', sans-serif;
        font-size: 2rem;
        font-weight: 700;
    }

    .balance-positive {
        color: #27ae60;
    }

    .balance-warning {
        color: #f39c12;
    }

    .balance-danger {
        color: #e74c3c;
    }

    /* TRANSACTIONS */
    .transactions-section {
        margin-top: 1.5rem;
    }

    .transactions-title {
        font-size: 0.9rem;
        color: #718096;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .transaction-list {
        space-y: 0.5rem;
    }

    .transaction-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem;
        background: rgba(248, 250, 252, 0.8);
        border-radius: 8px;
        border-left: 3px solid transparent;
    }

    .transaction-description {
        font-weight: 500;
        color: #2d3748;
        flex: 1;
    }

    .transaction-amount {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .transaction-positive {
        border-left-color: #27ae60;
        color: #27ae60;
    }

    .transaction-negative {
        border-left-color: #e74c3c;
        color: #e74c3c;
    }

    /* PIED DE COMPTE */
    .account-footer {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .update-time {
        font-size: 0.8rem;
        color: #718096;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ÉTAT VIDE */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #718096;
    }

    .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    /* ANIMATIONS SÉQUENTIELLES */
    .animate-delay-1 { animation-delay: 0.1s; }
    .animate-delay-2 { animation-delay: 0.2s; }
    .animate-delay-3 { animation-delay: 0.3s; }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem 0.5rem;
        }

        .welcome-title {
            font-size: 2rem;
        }

        .balance-amount {
            font-size: 2.2rem;
        }

        .account-grid {
            grid-template-columns: 1fr;
        }

        .account-card {
            padding: 1.5rem;
        }

        .balance-amount-large {
            font-size: 1.6rem;
        }
    }
</style>

<div class="dashboard-container">

    <!-- SECTION 1: EN-TÊTE DE BIENVENUE -->
    <section class="welcome-section">
        <div class="welcome-content">
            <h1 class="welcome-title">Bienvenue, {{ Auth::user()->name }} {{ Auth::user()->prenom }}</h1>
            <p class="welcome-subtitle">Votre espace bancaire sécurisé</p>
            <div class="client-badge">
                Code client : {{ Auth::id() }}
            </div>
        </div>
    </section>

    <!-- SECTION 2: SOLDE GLOBAL -->
    <section class="balance-section">
        <div class="balance-content">
            <div class="balance-label">Solde total de vos comptes</div>
            <div class="balance-amount">
                {{ number_format($comptes->sum('solde'), 2, ',', ' ') }} MAD
            </div>
        </div>
    </section>

    <!-- SECTION 3: COMPTES BANCAIRES -->
    <section class="accounts-section">
        <header class="section-header">
            <i class="fas fa-wallet"></i>
            <span>Vos Comptes Bancaires</span>
        </header>

        <div class="section-content">
            @if($comptes->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-piggy-bank empty-icon"></i>
                    <h4>Aucun compte bancaire</h4>
                    <p>Vous n'avez aucun compte bancaire pour le moment.</p>
                </div>
            @else
                <div class="account-grid">
                    @foreach($comptes as $index => $compte)
                    <div class="account-card animate-delay-{{ ($index % 3) + 1 }}">
                        
                        <!-- En-tête du compte -->
                        <div class="account-header">
                            <div class="account-info">
                                <div class="account-rib">{{ $compte->rib }}</div>
                                @if($compte->type == 'Courant')
                                    <span class="account-type type-courant">
                                        <i class="fas fa-credit-card"></i>Compte Courant
                                    </span>
                                @elseif($compte->type == 'Epargne')
                                    <span class="account-type type-epargne">
                                        <i class="fas fa-piggy-bank"></i>Compte Épargne
                                    </span>
                                @else
                                    <span class="account-type type-autre">
                                        <i class="fas fa-university"></i>{{ $compte->type ?? 'Compte Standard' }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Solde du compte -->
                        <div class="account-balance-section">
                            <div class="balance-label-small">Solde actuel</div>
                            <div class="balance-amount-large 
                                @if($compte->solde < 0)
                                    balance-danger
                                @elseif($compte->solde < 100)
                                    balance-warning
                                @else
                                    balance-positive
                                @endif">
                                {{ number_format($compte->solde, 2, ',', ' ') }} MAD
                            </div>
                        </div>

                        <!-- Transactions récentes -->
                        @php
                            $transactions = $compte->transactions();
                        @endphp

                        @if($transactions->isNotEmpty())
                            <div class="transactions-section">
                                <div class="transactions-title">Dernières opérations</div>
                                <div class="transaction-list">
                                    @foreach($transactions->take(3) as $tx)
                                        <div class="transaction-item">
                                            <span class="transaction-description">{{ $tx->description }}</span>
                                            <span class="transaction-amount {{ $tx->montant < 0 ? 'transaction-negative' : 'transaction-positive' }}">
                                                {{ $tx->montant < 0 ? '-' : '+' }}{{ number_format(abs($tx->montant), 2, ',', ' ') }} MAD
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Pied de compte -->
                        <div class="account-footer">
                            <div class="update-time">
                                <i class="fas fa-clock"></i>
                                Dernière mise à jour : {{ $compte->updated_at->format('d/m/Y à H:i') }}
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

</div>

@endsection