<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A&H-Bank</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<style>
    :root {
        --primary: #1a5f7a;
        --primary-dark: #144d63;
        --primary-light: #57a6c7;
        --accent: #ff9a3c;
        --accent-dark: #e87c1c;
        --light: #f8f9fa;
        --dark: #212529;
        --success: #28a745;
        --danger: #dc3545;
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        --gradient-accent: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
        --shadow-sm: 0 2px 10px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 8px 30px rgba(0, 0, 0, 0.15);
        --border-radius: 12px;
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #f5f7fa;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(26, 95, 122, 0.05) 0%, transparent 20%),
            radial-gradient(circle at 90% 80%, rgba(255, 154, 60, 0.05) 0%, transparent 20%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        color: var(--dark);
        line-height: 1.6;
    }

    /* Navbar Personnalisée */
    .navbar {
        background: var(--gradient-primary) !important;
        padding: 0.8rem 0;
        box-shadow: var(--shadow-md);
        position: relative;
        z-index: 1000;
    }

    .navbar::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--gradient-accent);
    }

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: white !important;
        display: flex;
        align-items: center;
        position: relative;
    }

    .navbar-brand::before {
        content: "🏦";
        margin-right: 10px;
        font-size: 1.6rem;
    }

    .navbar-brand::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--accent);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover::after {
        transform: scaleX(1);
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500;
        transition: var(--transition);
        position: relative;
        padding: 8px 16px !important;
        border-radius: 30px;
        margin: 0 4px;
    }

    .nav-link:hover {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--accent);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after {
        width: 70%;
    }

    .btn-outline-light {
        border-radius: 30px;
        padding: 6px 18px;
        font-weight: 500;
        transition: var(--transition);
        border-width: 2px;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    }

    /* Main Content */
    main.container {
        flex: 1;
        margin-top: 2.5rem;
        margin-bottom: 2rem;
        padding: 2.5rem;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-lg);
        animation: fadeInUp 0.6s ease-out;
        position: relative;
        overflow: hidden;
    }

    main.container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--gradient-accent);
    }

    /* Alerts Personnalisés */
    .alert {
        border-radius: var(--border-radius);
        font-size: 0.95rem;
        box-shadow: var(--shadow-sm);
        border: none;
        padding: 1rem 1.25rem;
        position: relative;
        overflow: hidden;
        border-left: 4px solid;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        border-left-color: var(--success);
        color: #155724;
    }

    .alert-danger {
        background-color: rgba(220, 53, 69, 0.1);
        border-left-color: var(--danger);
        color: #721c24;
    }

    .alert-dismissible .btn-close {
        padding: 0.75rem;
    }

    /* Footer Personnalisé */
    footer {
        background: var(--gradient-primary);
        color: white;
        padding: 2rem 0 1.5rem;
        text-align: center;
        margin-top: auto;
        position: relative;
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--gradient-accent);
    }

    .footer-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .footer-links {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .footer-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: var(--transition);
    }

    .footer-links a:hover {
        color: white;
        transform: translateY(-2px);
    }

    .footer-social {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .footer-social a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: white;
        transition: var(--transition);
    }

    .footer-social a:hover {
        background: var(--accent);
        transform: translateY(-3px);
    }

    .copyright {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 1rem;
        width: 100%;
    }

    /* Effets supplémentaires pour les éléments interactifs */
    .btn {
        transition: var(--transition);
        font-weight: 500;
        border-radius: 30px;
        padding: 8px 20px;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
        background: var(--gradient-primary);
        border: none;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
    }

    .btn-accent {
        background: var(--gradient-accent);
        border: none;
        color: white;
    }

    .btn-accent:hover {
        background: var(--accent-dark);
        color: white;
    }

    /* Améliorations responsive */
    @media (max-width: 768px) {
        main.container {
            padding: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
        }
        
        .footer-links {
            flex-direction: column;
            gap: 0.8rem;
        }
    }

    /* Style pour le formulaire de déconnexion */
    form.d-inline button {
        transition: var(--transition);
    }

    h1, h2, h3, h4, h5, h6 {
        font-weight: 600;
        color: var(--primary-dark);
    }

    h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }

    p {
        color: #4a5568;
    }
</style>


</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">A&H-Bank</a>


<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.show') }}">
                    <i class="fas fa-user-circle me-1"></i> Mon Profil
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-outline-light" type="submit">
                        <i class="fas fa-sign-out-alt me-1"></i> Se déconnecter
                    </button>
                </form>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Connexion</a>
            </li>
        @endguest
    </ul>
</div>


  </div>
</nav>

<!-- Main Content -->

<main class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
@endif

@yield('content')


</main>

<!-- Footer -->

<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">A&H-Bank</div>
            <div class="footer-links">
                <a href="{{ route('about') }}">À propos</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('privacy') }}">Confidentialité</a>
            </div>


        <div class="copyright">
            &copy; {{ date('Y') }} A&H-Bank. Tous droits réservés.
        </div>
    </div>
</div>


</footer>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
