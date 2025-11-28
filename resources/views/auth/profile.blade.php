<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Administrateur - A&H Bank</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #1a5f7a;
            --primary-dark: #144d63;
            --primary-light: #57a6c7;
            --accent-gold: #d4af37;
            --success-green: #28a745;
            --warning-orange: #ffc107;
            --danger-red: #dc3545;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --border-radius: 16px;
            --shadow-soft: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
            --shadow-strong: 0 12px 40px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --gradient-primary: linear-gradient(135deg, var(--primary-blue), var(--primary-dark));
            --gradient-success: linear-gradient(135deg, var(--success-green), #20c997);
        }

        .profile-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #f8f9fa 100%);
            min-height: 100vh;
            padding: 2rem 0;
            position: relative;
            overflow-x: hidden;
        }

        .profile-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 300px;
            background: var(--gradient-primary);
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
            z-index: 0;
        }

        .profile-container > .container {
            position: relative;
            z-index: 1;
        }

        .profile-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-strong);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: var(--gradient-primary);
        }

        .profile-header h1 {
            font-weight: 800;
            margin-bottom: 0.5rem;
            font-size: 2.75rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-strong);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
            overflow: hidden;
            position: relative;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .profile-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-strong);
        }

        .avatar-container {
            position: relative;
            display: inline-block;
        }

        .avatar-container::after {
            content: '';
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 24px;
            height: 24px;
            background: var(--success-green);
            border: 3px solid white;
            border-radius: 50%;
            box-shadow: var(--shadow-soft);
        }

        .avatar-img {
            width: 140px;
            height: 140px;
            border: 6px solid white;
            box-shadow: var(--shadow-medium);
            transition: var(--transition);
        }

        .profile-card:hover .avatar-img {
            transform: scale(1.08) rotate(5deg);
        }

        .profile-info h3 {
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            position: relative;
            display: inline-block;
        }

        .profile-info h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .profile-info p {
            color: #6c757d;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.1rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-info i {
            color: var(--primary-blue);
            width: 24px;
            font-size: 1.2rem;
            background: rgba(26, 95, 122, 0.1);
            padding: 0.5rem;
            border-radius: 8px;
            transition: var(--transition);
        }

        .profile-info p:hover i {
            background: var(--gradient-primary);
            color: white;
            transform: scale(1.1);
        }

        .actions-section h4 {
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            position: relative;
            padding-left: 1rem;
        }

        .actions-section h4::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 30px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .action-item {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: var(--transition);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-soft);
            position: relative;
            overflow: hidden;
        }

        .action-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--gradient-primary);
            transition: var(--transition);
        }

        .action-item:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-medium);
            border-color: var(--primary-light);
        }

        .action-item:hover::before {
            width: 8px;
        }

        .action-content {
            flex: 1;
            padding-left: 1rem;
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            transition: var(--transition);
            box-shadow: var(--shadow-soft);
        }

        .action-item:hover .action-icon {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 8px 25px rgba(26, 95, 122, 0.3);
        }

        .action-title {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .action-description {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }

        .action-btn {
            background: var(--gradient-success);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--shadow-soft);
            position: relative;
            overflow: hidden;
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(40, 167, 69, 0.4);
        }

        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow-strong);
            overflow: hidden;
        }

        .modal-header {
            background: var(--gradient-primary);
            color: white;
            border-bottom: none;
            padding: 1.5rem 2rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: var(--transition);
            background: rgba(248, 249, 250, 0.8);
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.3rem rgba(26, 95, 122, 0.15);
            background: white;
            transform: translateY(-2px);
        }

        .input-group .btn-outline-secondary:hover {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
            background: rgba(233, 236, 239, 0.8);
            overflow: hidden;
        }

        .password-strength-weak {
            background: linear-gradient(90deg, #dc3545, #e74c3c);
        }

        .password-strength-medium {
            background: linear-gradient(90deg, #ffc107, #f39c12);
        }

        .password-strength-strong {
            background: linear-gradient(90deg, #28a745, #2ecc71);
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            border-radius: 10px;
            padding: 0.875rem 2.5rem;
            font-weight: 700;
            transition: var(--transition);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(26, 95, 122, 0.4);
        }

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

        .profile-card, .action-item {
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 1rem;
            }
            
            .profile-header {
                padding: 1.5rem;
                text-align: center;
            }
            
            .profile-header h1 {
                font-size: 2.25rem;
            }
            
            .profile-card .card-body {
                text-align: center;
                flex-direction: column;
            }
            
            .avatar-container {
                margin-bottom: 1.5rem;
            }
            
            .avatar-img {
                width: 120px;
                height: 120px;
            }
            
            .action-item {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
                padding: 1.5rem;
            }
            
            .action-content {
                padding-left: 0;
            }
        }

        .is-valid {
            border-color: var(--success-green) !important;
        }

        .is-invalid {
            border-color: var(--danger-red) !important;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="container">
            <!-- Header -->
            <div class="profile-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Profil Administrateur</h1>
                        <span class="badge bg-warning text-dark">Administrateur Système</span>
                    </div>
                    <div class="text-end">
                        <p class="mb-0 text-muted">Dernière connexion: Aujourd'hui</p>
                        <small class="text-success">Session active</small>
                    </div>
                </div>
            </div>

            <!-- Section Profil -->
            <div class="card profile-card mb-4">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="avatar-container me-4">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff&size=140"
                             class="avatar-img rounded-circle" alt="Avatar Administrateur">
                    </div>

                    <div class="profile-info flex-grow-1">
                        <h3>Admin User</h3>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <strong>Email:</strong> admin@ahbank.com
                        </p>
                        <p>
                            <i class="fas fa-id-card"></i>
                            <strong>ID Utilisateur:</strong> #001
                        </p>
                        <p>
                            <i class="fas fa-calendar-alt"></i>
                            <strong>Membre depuis:</strong> 01/01/2024
                        </p>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="actions-section">
                <h4>⚡ Actions Rapides</h4>
                
                <!-- Modifier mes informations -->
                <div class="action-item">
                    <div class="action-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Modifier mes informations</div>
                        <div class="action-description">admin@ahbank.com</div>
                    </div>
                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editInfoModal">
                        Modifier
                    </button>
                </div>

                <!-- Changer mot de passe -->
                <div class="action-item">
                    <div class="action-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Changer mon mot de passe</div>
                        <div class="action-description">Sécurité du compte</div>
                    </div>
                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        Modifier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de changement de mot de passe -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">
                        <i class="fas fa-lock me-2"></i>Changer mon mot de passe
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm">
                        <!-- Ancien mot de passe -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mot de passe actuel</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="current_password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Nouveau mot de passe -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Nouveau mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text">
                                Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.
                            </div>
                        </div>

                        <!-- Confirmation nouveau mot de passe -->
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password_confirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Indicateur de force du mot de passe -->
                        <div class="mb-3">
                            <div class="progress" style="height: 10px;">
                                <div id="passwordStrength" class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <small id="passwordStrengthText" class="form-text"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="submitPasswordChange">
                        <i class="fas fa-save me-1"></i>Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal modification informations -->
    <div class="modal fade" id="editInfoModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-edit me-2"></i>Modifier mes informations</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" name="name" class="form-control" value="Admin User" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="admin@ahbank.com" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour afficher/masquer le mot de passe
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });

            // Vérification de la force du mot de passe
            const newPasswordInput = document.getElementById('new_password');
            const passwordStrength = document.getElementById('passwordStrength');
            const passwordStrengthText = document.getElementById('passwordStrengthText');

            newPasswordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let text = '';
                let color = '';

                if (password.length >= 8) strength += 25;
                if (/[A-Z]/.test(password)) strength += 25;
                if (/[a-z]/.test(password)) strength += 25;
                if (/[0-9]/.test(password)) strength += 25;

                if (strength === 0) {
                    text = 'Très faible';
                    color = 'password-strength-weak';
                } else if (strength <= 50) {
                    text = 'Faible';
                    color = 'password-strength-weak';
                } else if (strength <= 75) {
                    text = 'Moyen';
                    color = 'password-strength-medium';
                } else {
                    text = 'Fort';
                    color = 'password-strength-strong';
                }

                passwordStrength.style.width = strength + '%';
                passwordStrength.className = 'progress-bar ' + color;
                passwordStrengthText.textContent = text;
                passwordStrengthText.className = 'form-text ' + (strength <= 50 ? 'text-danger' : strength <= 75 ? 'text-warning' : 'text-success');
            });

            // Soumission du formulaire
            document.getElementById('submitPasswordChange').addEventListener('click', function() {
                const currentPassword = document.getElementById('current_password').value;
                const newPassword = document.getElementById('new_password').value;
                const confirmPassword = document.getElementById('new_password_confirmation').value;

                if (!currentPassword || !newPassword || !confirmPassword) {
                    alert('Veuillez remplir tous les champs.');
                    return;
                }

                if (newPassword !== confirmPassword) {
                    alert('Les mots de passe ne correspondent pas.');
                    return;
                }

                alert('Mot de passe changé avec succès!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
                modal.hide();
                document.getElementById('changePasswordForm').reset();
            });
        });
    </script>
</body>
</html>