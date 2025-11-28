@extends('layouts.app')

@section('title', 'Contact - Hiba Bank')
@section('content')
<div class="page-hero">
    <div class="container text-center">
        <h1 class="display-4">Contactez-nous</h1>
        <p class="lead">Nous sommes à votre écoute</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h3>Informations de contact</h3>
            <div class="mb-4">
                <h5>📍 Adresse</h5>
                <p>Angle Boulevard d'Anfa et Rue Mohammed Smiha<br>Casablanca, Maroc</p>
            </div>
            <div class="mb-4">
                <h5>📞 Téléphone</h5>
                <p>+212 5 22 34 56 78</p>
            </div>
            <div class="mb-4">
                <h5>📧 Email</h5>
                <p>contact@hiba-bank.ma</p>
            </div>
            <div class="mb-4">
                <h5>🕒 Horaires d'ouverture</h5>
                <p>Lundi - Vendredi: 8h30 - 18h30<br>Samedi: 9h00 - 13h00</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Envoyez-nous un message</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sujet</label>
                            <select class="form-select">
                                <option>Information générale</option>
                                <option>Support technique</option>
                                <option>Réclamation</option>
                                <option>Ouverture de compte</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection