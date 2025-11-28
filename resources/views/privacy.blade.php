@extends('layouts.app')
@section('title', 'Confidentialité - Hiba Bank')
@section('content')
<div class="container py-5">
    <h1 class="mb-4">Politique de Confidentialité</h1>
    
    <div class="mb-4">
        <h3>1. Collecte des Informations</h3>
        <p>Nous collectons les informations que vous nous fournissez lorsque vous :</p>
        <ul>
            <li>Ouvrez un compte</li>
            <li>Effectuez des transactions</li>
            <li>Utilisez nos services en ligne</li>
            <li>Contactez notre service client</li>
        </ul>
    </div>

    <div class="mb-4">
        <h3>2. Utilisation des Informations</h3>
        <p>Vos informations sont utilisées pour :</p>
        <ul>
            <li>Fournir nos services bancaires</li>
            <li>Vérifier votre identité</li>
            <li>Protéger contre la fraude</li>
            <li>Respecter les obligations légales</li>
        </ul>
    </div>

    <div class="mb-4">
        <h3>3. Protection des Données</h3>
        <p>Nous protégeons vos données avec :</p>
        <ul>
            <li>Chiffrement des informations</li>
            <li>Contrôles de sécurité stricts</li>
            <li>Formation de notre personnel</li>
        </ul>
    </div>

    <div class="mb-4">
        <h3>4. Partage des Informations</h3>
        <p>Nous ne partageons vos informations qu'avec :</p>
        <ul>
            <li>Les autorités réglementaires (si requis par la loi)</li>
            <li>Nos prestataires de services essentiels</li>
        </ul>
    </div>

    <div class="mb-4">
        <h3>5. Vos Droits</h3>
        <p>Vous avez le droit de :</p>
        <ul>
            <li>Accéder à vos données</li>
            <li>Corriger les erreurs</li>
            <li>Supprimer vos données (dans certaines conditions)</li>
        </ul>
    </div>

    <div class="mb-4">
        <h3>6. Contact</h3>
        <p>Pour toute question sur la confidentialité :</p>
        <p>
            Email: <strong>confidentialite@hibabank.ma</strong><br>
            Téléphone: <strong>+212 5 22 123 456</strong>
        </p>
    </div>

    <div class="alert alert-info">
        <strong>Dernière mise à jour :</strong> {{ date('d/m/Y') }}
    </div>
</div>
@endsection