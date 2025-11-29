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
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* NOUVEAU LOGO PERSONNALISÉ */
    .bank-logo {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: var(--gradient-primary);
        border-radius: 12px;
        margin-right: 12px;
        position: relative;
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(26, 95, 122, 0.3);
        overflow: hidden;
    }

    .bank-logo::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.2) 50%, transparent 60%);
        animation: logoShine 3s infinite linear;
    }

    .bank-logo-inner {
        width: 30px;
        height: 30px;
        background: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
    }

    .bank-logo-symbol {
        font-weight: 900;
        font-size: 14px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        font-family: 'Inter', sans-serif;
    }

    @keyframes logoShine {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    /* ANIMATIONS PERSONNALISÉES AMÉLIORÉES */
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

    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg) scale(1);
        }
        33% {
            transform: translateY(-20px) rotate(5deg) scale(1.1);
        }
        66% {
            transform: translateY(-10px) rotate(-3deg) scale(0.9);
        }
    }

    @keyframes floatReverse {
        0%, 100% {
            transform: translateY(0) rotate(0deg) scale(1);
        }
        33% {
            transform: translateY(-15px) rotate(-5deg) scale(1.05);
        }
        66% {
            transform: translateY(-8px) rotate(3deg) scale(0.95);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(255, 154, 60, 0.4);
        }
        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 15px rgba(255, 154, 60, 0);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(255, 154, 60, 0);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }

    @keyframes moneyTransfer {
        0% {
            transform: translateX(-150px) scale(0.8) rotate(-10deg);
            opacity: 0;
        }
        20% {
            opacity: 0.8;
        }
        80% {
            opacity: 0.8;
        }
        100% {
            transform: translateX(150px) scale(1.2) rotate(10deg);
            opacity: 0;
        }
    }

    @keyframes coinSpin {
        0% {
            transform: rotateY(0deg) scale(1);
        }
        50% {
            transform: rotateY(180deg) scale(1.2);
        }
        100% {
            transform: rotateY(360deg) scale(1);
        }
    }

    @keyframes ripple {
        0% {
            transform: scale(0);
            opacity: 0.5;
        }
        100% {
            transform: scale(4);
            opacity: 0;
        }
    }

    @keyframes currencyFlow {
        0% {
            transform: translateX(-100px) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateX(calc(100vw + 100px)) rotate(360deg);
            opacity: 0;
        }
    }

    @keyframes goldenGlow {
        0%, 100% {
            filter: drop-shadow(0 0 5px rgba(255, 215, 0, 0.3));
        }
        50% {
            filter: drop-shadow(0 0 20px rgba(255, 215, 0, 0.8));
        }
    }

    /* BACKGROUND AMÉLIORÉ AVEC PLUS D'ÉLÉMENTS */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f5f7fa;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(26, 95, 122, 0.08) 0%, transparent 25%),
            radial-gradient(circle at 90% 80%, rgba(255, 154, 60, 0.08) 0%, transparent 25%),
            linear-gradient(45deg, transparent 65%, rgba(26, 95, 122, 0.05) 0%),
            linear-gradient(-45deg, transparent 65%, rgba(255, 154, 60, 0.05) 0%),
            repeating-linear-gradient(45deg, transparent, transparent 2px, rgba(26, 95, 122, 0.02) 2px, rgba(26, 95, 122, 0.02) 4px),
            repeating-linear-gradient(-45deg, transparent, transparent 2px, rgba(255, 154, 60, 0.02) 2px, rgba(255, 154, 60, 0.02) 4px);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        color: var(--dark);
        line-height: 1.6;
        overflow-x: hidden;
        position: relative;
    }

    /* ÉLÉMENTS D'ARGENT ANIMÉS EN ARRIÈRE-PLAN - VERSION AMÉLIORÉE */
    .money-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
        overflow: hidden;
    }

    .floating-money {
        position: absolute;
        font-size: 2rem;
        opacity: 0.1;
        animation: float 6s infinite ease-in-out;
        filter: drop-shadow(0 2px 8px rgba(0,0,0,0.15));
        text-shadow: 0 2px 10px rgba(255, 215, 0, 0.3);
        z-index: 1;
    }

    .floating-money.small {
        font-size: 1.2rem;
        opacity: 0.07;
        animation: floatReverse 8s infinite ease-in-out;
    }

    .floating-money.large {
        font-size: 3rem;
        opacity: 0.05;
        animation: float 10s infinite ease-in-out;
    }

    .money-transfer {
        position: absolute;
        font-size: 1.5rem;
        animation: moneyTransfer 8s infinite linear;
        opacity: 0;
        filter: drop-shadow(0 2px 10px rgba(255, 215, 0, 0.4));
        z-index: 2;
    }

    .currency-flow {
        position: absolute;
        font-size: 1.8rem;
        animation: currencyFlow 15s infinite linear;
        opacity: 0;
        filter: drop-shadow(0 2px 8px rgba(255, 215, 0, 0.3));
        z-index: 0;
    }

    .golden-glow {
        animation: goldenGlow 3s infinite ease-in-out;
    }

    /* EFFET DE PARTICULES FINANCIÈRES */
    .financial-particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -2;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: linear-gradient(45deg, var(--primary-light), var(--accent));
        border-radius: 50%;
        opacity: 0.3;
        animation: particleFloat 20s infinite linear;
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 0.3;
        }
        90% {
            opacity: 0.3;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }

    /* GRADIENTS ANIMÉS EN ARRIÈRE-PLAN */
    .animated-gradients {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -3;
        opacity: 0.1;
    }

    .gradient-1 {
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 50%;
        background: radial-gradient(circle, var(--primary-light) 0%, transparent 70%);
        animation: gradientMove 20s infinite alternate ease-in-out;
    }

    .gradient-2 {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 50%;
        height: 50%;
        background: radial-gradient(circle, var(--accent) 0%, transparent 70%);
        animation: gradientMove 25s infinite alternate-reverse ease-in-out;
    }

    @keyframes gradientMove {
        0% {
            transform: translate(0, 0) scale(1);
        }
        100% {
            transform: translate(50px, 50px) scale(1.2);
        }
    }

    /* NAVBAR AMÉLIORÉE AVEC NOUVEAU LOGO */
    .navbar {
        background: var(--gradient-primary) !important;
        padding: 0.8rem 0;
        box-shadow: var(--shadow-md);
        position: relative;
        z-index: 1000;
        transition: var(--transition);
    }

    .navbar.scrolled {
        padding: 0.5rem 0;
        box-shadow: var(--shadow-lg);
        backdrop-filter: blur(10px);
    }

    .navbar::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--gradient-accent);
        animation: shimmer 3s infinite linear;
    }

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: white !important;
        display: flex;
        align-items: center;
        position: relative;
        transition: var(--transition);
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .navbar-brand:hover .bank-logo {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 6px 20px rgba(26, 95, 122, 0.5);
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
        box-shadow: 0 2px 8px rgba(255, 154, 60, 0.5);
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
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .nav-link:hover::before {
        left: 100%;
    }

    .nav-link:hover {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
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
        box-shadow: 0 2px 8px rgba(255, 154, 60, 0.5);
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
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .btn-outline-light::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-outline-light:hover::before {
        left: 100%;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
    }

    /* MAIN CONTENT AMÉLIORÉ */
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
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    main.container:hover {
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    main.container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--gradient-accent);
        animation: shimmer 4s infinite linear;
        box-shadow: 0 2px 15px rgba(255, 154, 60, 0.5);
    }

    main.container::after {
        content: "💳🏦💰";
        position: absolute;
        bottom: -30px;
        right: -30px;
        font-size: 8rem;
        opacity: 0.02;
        transform: rotate(-15deg);
        pointer-events: none;
        animation: float 10s infinite ease-in-out;
    }

    /* ALERTS ANIMÉS */
    .alert {
        border-radius: var(--border-radius);
        font-size: 0.95rem;
        box-shadow: var(--shadow-sm);
        border: none;
        padding: 1rem 1.25rem;
        position: relative;
        overflow: hidden;
        border-left: 4px solid;
        animation: fadeInUp 0.5s ease-out;
        transition: var(--transition);
        backdrop-filter: blur(5px);
    }

    .alert:hover {
        transform: translateX(10px);
        box-shadow: var(--shadow-md);
    }

    .alert-success {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.1) 0%, rgba(40, 167, 69, 0.05) 100%);
        border-left-color: var(--success);
        color: #155724;
    }

    .alert-danger {
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(220, 53, 69, 0.05) 100%);
        border-left-color: var(--danger);
        color: #721c24;
    }

    .alert-dismissible .btn-close {
        padding: 0.75rem;
        transition: var(--transition);
    }

    .alert-dismissible .btn-close:hover {
        transform: scale(1.2) rotate(90deg);
        background: rgba(0,0,0,0.1);
    }

    /* FOOTER AMÉLIORÉ */
    footer {
        background: var(--gradient-primary);
        color: white;
        padding: 2rem 0 1.5rem;
        text-align: center;
        margin-top: auto;
        position: relative;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    footer:hover {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        transform: translateY(-2px);
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--gradient-accent);
        animation: shimmer 3s infinite linear;
        box-shadow: 0 2px 15px rgba(255, 154, 60, 0.5);
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
        transition: var(--transition);
        position: relative;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .footer-logo::before {
        content: "💰";
        position: absolute;
        left: -40px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: var(--transition);
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
    }

    .footer-logo:hover::before {
        opacity: 1;
        left: -30px;
        animation: coinSpin 1s ease-in-out;
    }

    .footer-logo:hover {
        transform: scale(1.05);
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
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
        position: relative;
        padding: 5px 0;
        font-weight: 500;
    }

    .footer-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--accent);
        transition: width 0.3s ease;
        box-shadow: 0 2px 8px rgba(255, 154, 60, 0.5);
    }

    .footer-links a:hover {
        color: white;
        transform: translateY(-3px);
        text-shadow: 0 2px 8px rgba(255,255,255,0.3);
    }

    .footer-links a:hover::after {
        width: 100%;
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
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: white;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .footer-social a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .footer-social a:hover::before {
        left: 100%;
    }

    .footer-social a:hover {
        background: var(--accent);
        transform: translateY(-5px) rotate(10deg);
        box-shadow: 0 8px 25px rgba(255, 154, 60, 0.5);
        animation: pulse 1s infinite;
    }

    .copyright {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 1rem;
        width: 100%;
        transition: var(--transition);
    }

    .copyright:hover {
        color: white;
        text-shadow: 0 2px 8px rgba(255,255,255,0.3);
    }

    /* BOUTONS AMÉLIORÉS */
    .btn {
        transition: var(--transition);
        font-weight: 600;
        border-radius: 30px;
        padding: 10px 25px;
        position: relative;
        overflow: hidden;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        backdrop-filter: blur(10px);
    }

    .btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }

    .btn:hover::after {
        animation: ripple 1s ease-out;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: var(--gradient-primary);
        box-shadow: 0 4px 15px rgba(26, 95, 122, 0.3);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        box-shadow: 0 8px 30px rgba(26, 95, 122, 0.5);
        animation: pulse 2s infinite;
    }

    .btn-accent {
        background: var(--gradient-accent);
        color: white;
        box-shadow: 0 4px 15px rgba(255, 154, 60, 0.3);
    }

    .btn-accent:hover {
        background: var(--accent-dark);
        box-shadow: 0 8px 30px rgba(255, 154, 60, 0.5);
        animation: pulse 2s infinite;
    }

    /* EFFETS SPÉCIAUX BANCAIRES */
    .banking-pulse {
        animation: pulse 2s infinite;
    }

    .money-icon {
        display: inline-block;
        transition: var(--transition);
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
    }

    .money-icon:hover {
        animation: pulse 0.5s ease-in-out;
        transform: scale(1.2);
        filter: drop-shadow(0 4px 8px rgba(255, 154, 60, 0.5));
    }

    /* GLOW EFFECT */
    .glow {
        box-shadow: 0 0 20px rgba(255, 154, 60, 0.3);
        animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from {
            box-shadow: 0 0 20px rgba(255, 154, 60, 0.3);
        }
        to {
            box-shadow: 0 0 30px rgba(255, 154, 60, 0.6);
        }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .floating-money.large {
            font-size: 2rem;
        }
        .currency-flow {
            display: none;
        }
        .bank-logo {
            width: 40px;
            height: 40px;
        }
        .bank-logo-inner {
            width: 25px;
            height: 25px;
        }
        .bank-logo-symbol {
            font-size: 12px;
        }
    }
</style>

</head>

<body>

<!-- Éléments de background améliorés -->
<div class="animated-gradients">
    <div class="gradient-1"></div>
    <div class="gradient-2"></div>
</div>

<div class="financial-particles" id="particles-container"></div>

<div class="money-background">
    <!-- Éléments d'argent flottants - Grande taille -->
    <div class="floating-money large" style="top:10%; left:8%; animation-delay:0s;">💰</div>
    <div class="floating-money large" style="top:20%; right:12%; animation-delay:2s;">💵</div>
    <div class="floating-money large" style="top:70%; left:5%; animation-delay:4s;">💳</div>
    <div class="floating-money large" style="top:80%; right:8%; animation-delay:6s;">💷</div>
    
    <!-- Éléments d'argent flottants - Taille normale -->
    <div class="floating-money" style="top:15%; left:15%; animation-delay:1s;">💰</div>
    <div class="floating-money" style="top:25%; right:20%; animation-delay:3s;">💵</div>
    <div class="floating-money" style="top:65%; left:12%; animation-delay:5s;">💳</div>
    <div class="floating-money" style="top:75%; right:15%; animation-delay:7s;">💷</div>
    <div class="floating-money" style="top:45%; left:20%; animation-delay:2s;">💶</div>
    <div class="floating-money" style="top:35%; right:25%; animation-delay:4s;">💎</div>
    <div class="floating-money" style="top:55%; left:25%; animation-delay:6s;">🏦</div>
    <div class="floating-money" style="top:40%; right:18%; animation-delay:8s;">💸</div>
    
    <!-- Éléments d'argent flottants - Petite taille -->
    <div class="floating-money small" style="top:30%; left:30%; animation-delay:0.5s;">💰</div>
    <div class="floating-money small" style="top:60%; right:30%; animation-delay:1.5s;">💵</div>
    <div class="floating-money small" style="top:20%; left:35%; animation-delay:2.5s;">💳</div>
    <div class="floating-money small" style="top:50%; right:35%; animation-delay:3.5s;">💷</div>
    <div class="floating-money small" style="top:70%; left:40%; animation-delay:4.5s;">💶</div>
    
    <!-- Transferts d'argent animés -->
    <div class="money-transfer" style="top:25%; left:5%; animation-delay:0s;">↑💰</div>
    <div class="money-transfer" style="top:50%; left:15%; animation-delay:3s;">↓💵</div>
    <div class="money-transfer" style="top:75%; left:10%; animation-delay:6s;">→💳</div>
    <div class="money-transfer" style="top:35%; left:8%; animation-delay:9s;">←💷</div>
    
    <!-- Flux de devises continues -->
    <div class="currency-flow" style="top:20%; animation-delay:0s;">💰</div>
    <div class="currency-flow" style="top:40%; animation-delay:5s;">💵</div>
    <div class="currency-flow" style="top:60%; animation-delay:10s;">💳</div>
    <div class="currency-flow golden-glow" style="top:80%; animation-delay:7s;">💎</div>
</div>

<!-- Navbar avec nouveau logo -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">
        <div class="bank-logo">
            <div class="bank-logo-inner">
                <div class="bank-logo-symbol">AH</div>
            </div>
        </div>
        A&H-Bank
    </a>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Génération de particules financières
    function createParticles() {
        const container = document.getElementById('particles-container');
        const particleCount = 50;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Position aléatoire
            const left = Math.random() * 100;
            const delay = Math.random() * 20;
            const duration = 15 + Math.random() * 15;
            
            particle.style.left = ${left}%;
            particle.style.animationDelay = ${delay}s;
            particle.style.animationDuration = ${duration}s;
            
            // Taille et opacité variables
            const size = 2 + Math.random() * 4;
            particle.style.width = ${size}px;
            particle.style.height = ${size}px;
            particle.style.opacity = 0.1 + Math.random() * 0.2;
            
            container.appendChild(particle);
        }
    }

    // Animation de la navbar au scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Effet de brillance aléatoire sur les éléments d'argent
    function addRandomGlow() {
        const floatingMoney = document.querySelectorAll('.floating-money');
        floatingMoney.forEach(money => {
            if (Math.random() > 0.8) {
                money.classList.add('golden-glow');
                setTimeout(() => {
                    money.classList.remove('golden-glow');
                }, 2000);
            }
        });
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        createParticles();
        setInterval(addRandomGlow, 3000);
        
        // Animation des icônes d'argent
        const moneyIcons = document.querySelectorAll('.money-icon');
        moneyIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                this.style.animation = 'pulse 0.5s ease-in-out';
                setTimeout(() => {
                    this.style.animation = '';
                }, 500);
            });
        });
    });
</script>

</body>
</html>