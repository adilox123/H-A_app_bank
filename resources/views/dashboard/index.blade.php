@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold dashboard-title">Tableau de Bord Administrateur</h2>
    
    <div class="row mt-4">
        <!-- Gestion des Clients -->
        <div class="col-md-4 mb-4">
            <div class="card management-card client-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-3">Gestion des Clients</h5>
                    <p class="card-text description-text">
                        Administration complète du portefeuille clients : création, modification 
                        et consultation des profils avec historique détaillé.
                    </p>
                    <div class="features-list mb-3">
                        <span class="feature-item">✓ Création de comptes</span>
                        <span class="feature-item">✓ Modification des profils</span>
                        <span class="feature-item">✓ Consultation détaillée</span>
                    </div>
                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-management w-100">
                        <i class="fas fa-cog me-2"></i>Accéder au module
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Gestion des Comptes -->
        <div class="col-md-4 mb-4">
            <div class="card management-card account-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-3">Gestion des Comptes</h5>
                    <p class="card-text description-text">
                        Gestion centralisée des comptes bancaires : ouverture, consultation 
                        des soldes et administration des numéros RIB.
                    </p>
                    <div class="features-list mb-3">
                        <span class="feature-item">✓ Ouverture de comptes</span>
                        <span class="feature-item">✓ Consultation des soldes</span>
                        <span class="feature-item">✓ Gestion des RIB</span>
                    </div>
                    <a href="{{ route('comptes.index') }}" class="btn btn-info btn-management w-100">
                        <i class="fas fa-wallet me-2"></i>Accéder au module
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Gestion des Virements -->
        <div class="col-md-4 mb-4">
            <div class="card management-card transfer-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-3">Gestion des Virements</h5>
                    <p class="card-text description-text">
                        Supervision et exécution sécurisée des transactions financières 
                        avec suivi en temps réel et historique complet.
                    </p>
                    <div class="features-list mb-3">
                        <span class="feature-item">✓ Virements multiples</span>
                        <span class="feature-item">✓ Validation des opérations</span>
                        <span class="feature-item">✓ Historique détaillé</span>
                    </div>
                    <a href="{{ route('virements.index') }}" class="btn btn-dark btn-management w-100">
                        <i class="fas fa-money-bill-transfer me-2"></i>Accéder au module
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Variables CSS cohérentes */
:root {
    --primary-blue: #1a5f7a;
    --primary-dark: #144d63;
    --info-blue: #2e86ab;
    --dark-blue: #1c6b8c;
    --shadow-soft: 0 4px 20px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
    --border-radius: 16px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Titre du dashboard */
.dashboard-title {
    color: #2c5530;
    font-family: 'Georgia', 'Times New Roman', serif;
    font-size: 2.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: linear-gradient(135deg, #2c5530, #4a7c59);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    padding-bottom: 15px;
}

.dashboard-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, #2c5530, #4a7c59);
    border-radius: 2px;
}

/* Cartes de gestion */
.management-card {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-soft);
    transition: var(--transition);
    background: white;
    position: relative;
    overflow: hidden;
}

.management-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-blue), var(--info-blue));
}

.client-card::before { background: linear-gradient(90deg, var(--primary-blue), #57a6c7); }
.account-card::before { background: linear-gradient(90deg, var(--info-blue), #4fb0d4); }
.transfer-card::before { background: linear-gradient(90deg, var(--dark-blue), #2c3e50); }

.management-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-hover);
}

/* Icônes */
.icon-wrapper {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.management-card:hover .icon-wrapper {
    transform: scale(1.1);
    background: linear-gradient(135deg, var(--primary-blue), var(--info-blue));
}

.icon-wrapper i {
    font-size: 2rem;
    color: var(--primary-blue);
    transition: var(--transition);
}

.management-card:hover .icon-wrapper i {
    color: white;
}

/* Typographie */
.card-title {
    color: var(--primary-dark);
    font-size: 1.25rem;
}

.description-text {
    color: #6c757d;
    line-height: 1.6;
    font-size: 0.95rem;
    margin-bottom: 1.5rem;
}

/* Liste des fonctionnalités */
.features-list {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.feature-item {
    background: #f8f9fa;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.85rem;
    color: var(--primary-dark);
    transition: var(--transition);
}

.management-card:hover .feature-item {
    background: rgba(26, 95, 122, 0.1);
    transform: translateX(5px);
}

/* Boutons */
.btn-management {
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.btn-management::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-management:hover::before {
    left: 100%;
}

.btn-management:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }
    
    .dashboard-title {
        font-size: 2rem;
        padding-bottom: 10px;
    }
    
    .management-card {
        margin-bottom: 1.5rem;
    }
    
    .icon-wrapper {
        width: 70px;
        height: 70px;
    }
    
    .icon-wrapper i {
        font-size: 1.75rem;
    }
}

/* Animation d'entrée */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.management-card {
    animation: fadeInUp 0.6s ease-out;
}

.management-card:nth-child(2) {
    animation-delay: 0.1s;
}

.management-card:nth-child(3) {
    animation-delay: 0.2s;
}
</style>
@endsection