<?php
    function iniciar_sessio(){
        mysqli
        session_start();
        $_SESSION['usuari'] = $usuari;
        header('Location: index.php');
    }
    iniciar_sessio();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Iniciar Sessió</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== LOGIN PAGE ===== */
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-blue) 0%, #163a64 60%, var(--primary-orange) 100%);
            padding: 40px 20px;
        }

        .login-container {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            display: flex;
            max-width: 900px;
            width: 100%;
            overflow: hidden;
        }

        /* Panel esquerre decoratiu */
        .login-side {
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

        .login-side img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .login-side h1 {
            color: #ffffff;
            font-size: 2rem;
            margin-bottom: 12px;
        }

        .login-side p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .login-side .side-stats {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .login-side .side-stat {
            text-align: center;
        }

        .login-side .side-stat span:first-child {
            display: block;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary-orange);
        }

        .login-side .side-stat span:last-child {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
        }

        /* Formulari dret */
        .login-form-wrapper {
            padding: 50px 45px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form-wrapper h2 {
            font-size: 1.6rem;
            margin-bottom: 8px;
        }

        .login-form-wrapper .login-subtitle {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
            background-color: #fafafa;
        }

        .form-group input:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 3px rgba(234, 107, 36, 0.15);
            background-color: #ffffff;
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.85rem;
        }

        .form-options label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #666;
            cursor: pointer;
        }

        .form-options label input[type="checkbox"] {
            accent-color: var(--primary-orange);
            width: 16px;
            height: 16px;
        }

        .form-options a {
            color: var(--primary-orange);
            font-weight: 500;
        }

        .form-options a:hover {
            text-decoration: underline;
        }

        .login-btn {
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

        .login-btn:hover {
            background-color: var(--primary-orange-hover);
            transform: translateY(-1px);
        }

        .login-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #ccc;
            font-size: 0.8rem;
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #e0e0e0;
        }

        .login-divider span {
            padding: 0 15px;
        }

        .social-login {
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

        .login-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 0.9rem;
            color: #888;
        }

        .login-footer a {
            color: var(--primary-orange);
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-side {
                width: 100%;
                min-width: unset;
                padding: 35px 30px;
            }

            .login-form-wrapper {
                padding: 35px 30px;
            }

            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="login-page">
        <div class="login-container">

            <!-- Panel esquerre -->
            <div class="login-side">
                <img src="images/logo.jfif" alt="AthNet Logo">
                <h1>AthNet</h1>
                <p>La xarxa social per a atletes. Connecta amb la comunitat, comparteix les teves marques i millora cada dia.</p>
                <div class="side-stats">
                    <div class="side-stat">
                        <span>2.5K+</span>
                        <span>Atletes</span>
                    </div>
                    <div class="side-stat">
                        <span>150+</span>
                        <span>Proves</span>
                    </div>
                    <div class="side-stat">
                        <span>50+</span>
                        <span>Clubs</span>
                    </div>
                </div>
            </div>

            <!-- Formulari de login -->
            <div class="login-form-wrapper">
                <h2>Benvingut de nou 👋</h2>
                <p class="login-subtitle">Inicia sessió per continuar a AthNet</p>

                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email">Correu electrònic</label>
                        <input type="email" id="email" name="email" placeholder="el-teu@correu.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contrasenya</label>
                        <input type="password" id="password" name="password" placeholder="La teva contrasenya" required>
                    </div>

                    <div class="form-options">
                        <label>
                            <input type="checkbox" name="remember"> Recorda'm
                        </label>
                        <a href="#">Has oblidat la contrasenya?</a>
                    </div>

                    <button type="submit" class="login-btn">Iniciar Sessió</button>
                </form>

                <div class="login-divider">
                    <span>o continua amb</span>
                </div>

                <div class="social-login">
                    <button class="social-btn">🏅 Strava</button>
                    <button class="social-btn">📧 Google</button>
                </div>

                <div class="login-footer">
                    <p>No tens compte? <a href="registre.php">Registra't gratis</a></p>
                    <p style="margin-top: 10px;"><a href="index.php" style="color: #888; font-weight: 400;">← Tornar a l'inici</a></p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
