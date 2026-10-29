<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Registrar-se</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== REGISTER PAGE ===== */
        .register-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-blue) 0%, #163a64 60%, var(--primary-orange) 100%);
            padding: 40px 20px;
        }

        .register-container {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            display: flex;
            max-width: 950px;
            width: 100%;
            overflow: hidden;
        }

        /* Panel esquerre decoratiu */
        .register-side {
            background: var(--primary-blue);
            color: #ffffff;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 40%;
            min-width: 300px;
        }

        .register-side img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .register-side h1 {
            color: #ffffff;
            font-size: 2rem;
            margin-bottom: 12px;
        }

        .register-side p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .register-side .side-features {
            margin-top: 30px;
            text-align: left;
        }

        .register-side .side-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
        }

        .register-side .side-feature-icon {
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        /* Formulari dret */
        .register-form-wrapper {
            padding: 45px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-form-wrapper h2 {
            font-size: 1.6rem;
            margin-bottom: 8px;
        }

        .register-form-wrapper .register-subtitle {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 28px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
            background-color: #fafafa;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 3px rgba(234, 107, 36, 0.15);
            background-color: #ffffff;
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .form-terms {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 22px;
            font-size: 0.85rem;
            color: #666;
        }

        .form-terms input[type="checkbox"] {
            accent-color: var(--primary-orange);
            width: 16px;
            height: 16px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .form-terms a {
            color: var(--primary-orange);
            font-weight: 500;
        }

        .form-terms a:hover {
            text-decoration: underline;
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            background-color: var(--primary-orange);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .register-btn:hover {
            background-color: var(--primary-orange-hover);
            transform: translateY(-1px);
        }

        .register-divider {
            display: flex;
            align-items: center;
            margin: 22px 0;
            color: #ccc;
            font-size: 0.8rem;
        }

        .register-divider::before,
        .register-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #e0e0e0;
        }

        .register-divider span {
            padding: 0 15px;
        }

        .social-register {
            display: flex;
            gap: 12px;
        }

        .social-btn {
            flex: 1;
            padding: 11px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: #ffffff;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-color);
            transition: border-color 0.3s, background-color 0.3s;
            text-align: center;
        }

        .social-btn:hover {
            border-color: var(--primary-blue);
            background-color: #f5f5f5;
        }

        .register-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 0.9rem;
            color: #888;
        }

        .register-footer a {
            color: var(--primary-orange);
            font-weight: 600;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }

            .register-side {
                width: 100%;
                min-width: unset;
                padding: 35px 30px;
            }

            .register-form-wrapper {
                padding: 35px 30px;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .social-register {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="register-page">
        <div class="register-container">

            <!-- Panel esquerre -->
            <div class="register-side">
                <img src="images/logo.jfif" alt="AthNet Logo">
                <h1>AthNet</h1>
                <p>Uneix-te a la comunitat d'atletisme més gran i comença a compartir el teu progrés.</p>

                <div class="side-features">
                    <div class="side-feature">
                        <span class="side-feature-icon">🏃</span>
                        <span>Registra els teus entrenaments</span>
                    </div>
                    <div class="side-feature">
                        <span class="side-feature-icon">📅</span>
                        <span>Inscriu-te a competicions</span>
                    </div>
                    <div class="side-feature">
                        <span class="side-feature-icon">🏆</span>
                        <span>Competeix a les classificacions</span>
                    </div>
                    <div class="side-feature">
                        <span class="side-feature-icon">👥</span>
                        <span>Connecta amb altres atletes</span>
                    </div>
                    <div class="side-feature">
                        <span class="side-feature-icon">📊</span>
                        <span>Consulta les teves estadístiques</span>
                    </div>
                </div>
            </div>

            <!-- Formulari de registre -->
            <div class="register-form-wrapper">
                <h2>Crea el teu compte 🏅</h2>
                <p class="register-subtitle">Registra't gratis i comença a córrer amb nosaltres</p>

                <form method="POST" action="registre.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" placeholder="El teu nom" required>
                        </div>
                        <div class="form-group">
                            <label for="cognoms">Cognoms</label>
                            <input type="text" id="cognoms" name="cognoms" placeholder="Els teus cognoms" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Nom d'usuari</label>
                        <input type="text" id="username" name="username" placeholder="@el-teu-usuari" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correu electrònic</label>
                        <input type="email" id="email" name="email" placeholder="el-teu@correu.com" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Contrasenya</label>
                            <input type="password" id="password" name="password" placeholder="Mínim 8 caràcters" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Repetir contrasenya</label>
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="Repeteix la contrasenya" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="data_naixement">Data de naixement</label>
                            <input type="date" id="data_naixement" name="data_naixement" required>
                        </div>
                        <div class="form-group">
                            <label for="club">Club (opcional)</label>
                            <input type="text" id="club" name="club" placeholder="El teu club d'atletisme">
                        </div>
                    </div>

                    <div class="form-terms">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Accepto els <a href="#">termes i condicions</a> i la <a href="#">política de privacitat</a> d'AthNet.</label>
                    </div>

                    <button type="submit" class="register-btn">Crear Compte</button>
                </form>

                <div class="register-divider">
                    <span>o registra't amb</span>
                </div>

                <div class="social-register">
                    <button class="social-btn">🏅 Strava</button>
                    <button class="social-btn">📧 Google</button>
                </div>

                <div class="register-footer">
                    <p>Ja tens compte? <a href="login.php">Inicia sessió</a></p>
                    <p style="margin-top: 10px;"><a href="index.php" style="color: #888; font-weight: 400;">← Tornar a l'inici</a></p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>

