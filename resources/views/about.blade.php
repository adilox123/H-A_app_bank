@extends('layouts.app')

@section('title', 'À propos - Hiba Bank')
@section('content')
<div class="page-hero">
    <div class="container text-center">
        <h1 class="display-4">À propos de A&H Bank</h1>
        <p class="lead">Votre partenaire financier de confiance</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h2>Notre Histoire</h2>
            <p>Fondée en 2025, Hiba Bank s'engage à révolutionner l'expérience bancaire au Maroc en offrant des services financiers innovants et accessibles.</p>
            
            <h3>Notre Mission</h3>
            <p>Faciliter l'accès aux services bancaires et accompagner nos clients dans la réalisation de leurs projets.</p>
            
            <h3>Nos Valeurs</h3>
            <ul>
                <li><strong>Transparence :</strong> Des conditions claires et sans surprises</li>
                <li><strong>Innovation :</strong> Des solutions technologiques modernes</li>
                <li><strong>Confiance :</strong> La sécurité de vos finances est notre priorité</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Chiffres clés</h4>
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="display-6 text-primary">10K+</div>
                            <small>Clients satisfaits</small>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="display-6 text-primary">50M+</div>
                            <small>MAD de virements</small>
                        </div>
                        <div class="col-6">
                            <div class="display-6 text-primary">99%</div>
                            <small>Disponibilité</small>
                        </div>
                        <div class="col-6">
                            <div class="display-6 text-primary">24/7</div>
                            <small>Service client</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection