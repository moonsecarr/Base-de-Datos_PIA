<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footballers - Iniciar sesion </title>
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/circle.css">
</head>

<body>

    <!-- //Contenedor del login -->
    <div class="loginContainer">

        <!-- Círculo decorativo estilo fútbol -->
        <div class="soccer-circle">

            <div class="circle-base"> </div>
            <div class="vertical-text">
                <span class="letter">F</span>
                <span class="letter o">O</span>
                <span class="letter o">O</span>
                <span class="letter">T</span>
                <span class="letter">B</span>
                <span class="letter">A</span>
                <span class="letter">L</span>
                <span class="letter">L</span>
                <span class="letter">E</span>
                <span class="letter">R</span>
                <span class="letter">S</span>
            </div>
            <!-- Nuevo enlace de registro -->
            <a href="/registro" class="register-link"> REGISTRO </a>
        </div>

        <form class="formLogin" action="/" method="POST">
            <h1 id="Titulo">INICIAR SESION</h1>
            <!-- Mostrar errores si existen -->
            <?php if (isset($error) && !empty($error)): ?>
                <div class="error-message" style="color: red; margin-bottom: 15px;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>


            <div class="formLogin">
                <label class="lbLogin" for="correo">Correo electrónico:</label><br>
                <input class="ipLogin" type="email" id="correo" name="correo"
                    required
                    value="<?php echo isset($correo) ? htmlspecialchars($correo) : ''; ?>"
                    placeholder="ejemplo@correo.com">
            </div>

            <div class="formLogin">
                <label class="lbLogin" for="contraseña">Contraseña:</label><br>
                <input class="ipLogin" type="password" id="contraseña" name="contraseña" required placeholder="Ingresa tu contraseña">
            </div>

            <button class="btnLogin" type="submit"> Iniciar sesion</button>


        </form>

    </div>

    <script src="/assets/js/circle.js"></script>

</body>

</html>