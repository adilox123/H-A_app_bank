@extends('layouts.app')

@section('title', 'Services - Hiba Bank')
@section('content')
<div class="page-hero">
    <div class="container text-center">
        <h1 class="display-4">Nos Services</h1>
        <p class="lead">Des solutions bancaires adaptées à vos besoins</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="display-1">💳</div>
                    <h4>Comptes Bancaires</h4>
                    <p>Comptes courants, comptes d'épargne et comptes professionnels avec des conditions avantageuses.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="display-1">🔄</div>
                    <h4>Virements</h4>
                    <p>Virements instantanés nationaux et internationaux avec des frais compétitifs.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="display-1">📱</div>
                    <h4>Banking Mobile</h4>
                    <p>Gérez vos comptes où que vous soyez avec notre application mobile sécurisée.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h3 class="text-center mb-4">Autres Services</h3>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">💼 Prêts personnels et professionnels</li>
                        <li class="list-group-item">🏠 Prêts immobiliers</li>
                        <li class="list-group-item">🛡️ Assurances</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">💳 Cartes de crédit et débit</li>
                        <li class="list-group-item">🌐 Services en ligne 24/7</li>
                        <li class="list-group-item">📊 Conseils financiers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection