<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Sécurisée - A&H-Bank</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&family=Cinzel:wght@400;500;600;700&family=Lora:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* BACKGROUND BANCAIRE PROFESSIONNEL */
    .bank-login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: 
            linear-gradient(135deg, #0f2d3d 0%, #1a5f7a 50%, #144d63 100%),
            url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="bankPattern" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="%23ffffff" opacity="0.05"/><rect x="0" y="0" width="40" height="1" fill="%23ffffff" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23bankPattern)"/></svg>');
        position: relative;
        overflow: hidden;
    }

    .bank-login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 30%, rgba(86, 166, 199, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(255, 154, 60, 0.1) 0%, transparent 50%);
        animation: bankBackgroundShift 15s ease-in-out infinite alternate;
    }

    @keyframes bankBackgroundShift {
        0% {
            transform: scale(1) rotate(0deg);
        }
        100% {
            transform: scale(1.1) rotate(1deg);
        }
    }

    /* CARTE DE CONNEXION BANCAIRE */
    .bank-login-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 3rem 2.5rem;
        box-shadow: 
            0 25px 50px rgba(0, 0, 0, 0.25),
            0 0 0 1px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        width: 100%;
        max-width: 450px;
        position: relative;
        z-index: 2;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: var(--transition);
        animation: cardEntrance 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
    }

    @keyframes cardEntrance {
        0% {
            opacity: 0;
            transform: translateY(50px) scale(0.9);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .bank-login-card:hover {
        transform: translateY(-5px);
        box-shadow: 
            0 35px 60px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    /* EN-TÊTE BANCAIRE PRESTIGIEUSE */
    .bank-login-header {
        text-align: center;
        margin-bottom: 2.5rem;
        position: relative;
    }

    .bank-logo-large {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 20px;
        margin-bottom: 1.5rem;
        position: relative;
        box-shadow: 
            0 10px 25px rgba(26, 95, 122, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: var(--transition);
        animation: logoGlow 3s ease-in-out infinite alternate;
    }

    @keyframes logoGlow {
        0% {
            box-shadow: 
                0 10px 25px rgba(26, 95, 122, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }
        100% {
            box-shadow: 
                0 10px 35px rgba(26, 95, 122, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }
    }

    .bank-logo-large::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.3) 50%, transparent 60%);
        animation: logoShine 3s infinite linear;
    }

    .bank-logo-inner-large {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .bank-logo-symbol-large {
        font-weight: 900;
        font-size: 18px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        font-family: 'Cinzel', serif;
        letter-spacing: 1px;
    }

    @keyframes logoShine {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    /* TITRE BANCAIRE PRESTIGIEUX */
    .bank-welcome-title {
        font-family: 'Cinzel', serif;
        font-weight: 700;
        font-size: 2.5rem;
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--accent) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        text-shadow: 0 4px 15px rgba(26, 95, 122, 0.3);
        line-height: 1.2;
        position: relative;
        animation: titleEntrance 1s ease-out both;
        animation-delay: 0.3s;
    }

    @keyframes titleEntrance {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .bank-welcome-subtitle {
        font-family: 'Lora', serif;
        color: #6b7280;
        font-size: 1.1rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        animation: subtitleEntrance 1s ease-out both;
        animation-delay: 0.5s;
    }

    @keyframes subtitleEntrance {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* FORMULAIRE BANCAIRE SÉCURISÉ */
    .bank-form-group {
        margin-bottom: 1.75rem;
        position: relative;
        animation: formFieldEntrance 0.8s ease-out both;
    }

    .bank-form-group:nth-child(1) { animation-delay: 0.7s; }
    .bank-form-group:nth-child(2) { animation-delay: 0.8s; }

    @keyframes formFieldEntrance {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .bank-form-label {
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 0.75rem;
        display: block;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-left: 8px;
    }

    .bank-form-label::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 16px;
        background: var(--gradient-accent);
        border-radius: 2px;
    }

    .bank-form-control {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e8edf2;
        border-radius: 10px;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        transition: var(--transition);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .bank-form-control:focus {
        outline: none;
        border-color: var(--primary);
        background: white;
        transform: translateY(-2px);
        box-shadow: 
            0 4px 15px rgba(26, 95, 122, 0.15),
            inset 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .bank-form-control::placeholder {
        color: #9ca3af;
        font-weight: 400;
    }

    .bank-input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        transition: var(--transition);
        background: rgba(255, 255, 255, 0.8);
        padding: 8px;
        border-radius: 6px;
    }

    .bank-form-control:focus + .bank-input-icon {
        color: var(--primary);
        background: rgba(26, 95, 122, 0.1);
    }

    /* BOUTON DE CONNEXION BANCAIRE */
    .bank-login-btn {
        width: 100%;
        padding: 16px;
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 12px;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 1.1rem;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 8px 25px rgba(26, 95, 122, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 1rem;
        animation: buttonEntrance 1s ease-out both;
        animation-delay: 0.9s;
    }

    @keyframes buttonEntrance {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .bank-login-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.6s;
    }

    .bank-login-btn:hover::before {
        left: 100%;
    }

    .bank-login-btn:hover {
        background: var(--gradient-accent);
        transform: translateY(-3px);
        box-shadow: 
            0 12px 30px rgba(255, 154, 60, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .bank-login-btn:active {
        transform: translateY(-1px);
    }

    /* ALERTES BANCAIRES */
    .bank-alert {
        border-radius: 10px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 2rem;
        border: none;
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
        animation: alertEntrance 0.6s ease-out both;
        border-left: 4px solid;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    @keyframes alertEntrance {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .bank-alert-danger {
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(220, 53, 69, 0.05) 100%);
        color: #721c24;
        border-left-color: var(--danger);
    }

    .bank-alert-danger ul {
        margin: 0;
        padding-left: 1rem;
    }

    .bank-alert-danger li {
        margin-bottom: 0.5rem;
        position: relative;
        padding-left: 8px;
    }

    .bank-alert-danger li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: var(--danger);
        font-weight: bold;
    }

    /* SÉCURITÉ VISUELLE */
    .bank-security-notice {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        animation: securityNoticeEntrance 1s ease-out both;
        animation-delay: 1.1s;
    }

    @keyframes securityNoticeEntrance {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .security-text {
        font-family: 'Inter', sans-serif;
        color: #6b7280;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .security-icon {
        color: var(--success);
        animation: securityPulse 2s ease-in-out infinite;
    }

    @keyframes securityPulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }

    /* PARTICULES BANCAIRES */
    .bank-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .bank-particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: bankParticleFloat 20s infinite linear;
    }

    @keyframes bankParticleFloat {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 0.4;
        }
        90% {
            opacity: 0.4;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 480px) {
        .bank-login-card {
            margin: 1rem;
            padding: 2rem 1.5rem;
        }
        
        .bank-welcome-title {
            font-size: 2rem;
        }
        
        .bank-logo-large {
            width: 60px;
            height: 60px;
        }
        
        .bank-logo-inner-large {
            width: 40px;
            height: 40px;
        }
    }
</style>
</head>

<body>
<div class="bank-login-container">
    <div class="bank-particles" id="bank-particles"></div>
    
    <div class="bank-login-card">
        <div class="bank-login-header">
            <div class="bank-logo-large">
                <div class="bank-logo-inner-large">
                    <div class="bank-logo-symbol-large">AH</div>
                </div>
            </div>
            <h1 class="bank-welcome-title">Connexion Sécurisée</h1>
            <p class="bank-welcome-subtitle">Accès Espace Client Privé</p>
        </div>

        @if ($errors->any())
            <div class="bank-alert bank-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" id="bankLoginForm">
            @csrf
            <div class="bank-form-group">
                <label class="bank-form-label">Identifiant Client</label>
                <input type="email" name="email" class="bank-form-control" value="{{ old('email') }}" required 
                       placeholder="saisissez.votre@email.com">
                <i class="fas fa-user-shield bank-input-icon"></i>
            </div>
            
            <div class="bank-form-group">
                <label class="bank-form-label">Code d'Accès</label>
                <input type="password" name="password" class="bank-form-control" required 
                       placeholder="●●●●●●●●">
                <i class="fas fa-lock bank-input-icon"></i>
            </div>
            
            <button type="submit" class="bank-login-btn" id="bankLoginButton">
                <i class="fas fa-shield-alt me-2"></i>Accéder à mon Espace
            </button>
        </form>

        <div class="bank-security-notice">
            <p class="security-text">
                <i class="fas fa-shield-check security-icon"></i>
                Connexion 100% sécurisée & cryptée
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Génération de particules bancaires
    function createBankParticles() {
        const container = document.getElementById('bank-particles');
        const particleCount = 25;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'bank-particle';
            
            const left = Math.random() * 100;
            const delay = Math.random() * 20;
            const duration = 15 + Math.random() * 10;
            
            particle.style.left = ${left}%;
            particle.style.animationDelay = ${delay}s;
            particle.style.animationDuration = ${duration}s;
            
            const size = 2 + Math.random() * 4;
            particle.style.width = ${size}px;
            particle.style.height = ${size}px;
            particle.style.opacity = 0.2 + Math.random() * 0.3;
            
            container.appendChild(particle);
        }
    }

    // Effet de chargement sécurisé
    document.getElementById('bankLoginForm').addEventListener('submit', function(e) {
        const button = document.getElementById('bankLoginButton');
        const originalText = button.innerHTML;
        
        button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Vérification en cours...';
        button.disabled = true;
        
        // Réinitialiser après 3 secondes (simulation)
        setTimeout(() => {
            button.innerHTML = originalText;
            button.disabled = false;
        }, 3000);
    });

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        createBankParticles();
        
        // Effet de focus amélioré pour les champs
        const inputs = document.querySelectorAll('.bank-form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.background = 'white';
                this.style.borderColor = 'var(--primary)';
            });
            
            input.addEventListener('blur', function() {
                this.style.background = 'rgba(255, 255, 255, 0.9)';
                this.style.borderColor = '#e8edf2';
            });
        });
    });
</script>
</body>
</html>