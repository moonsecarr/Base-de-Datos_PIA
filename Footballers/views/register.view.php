<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footballers - Registro</title>
    <link rel="stylesheet" href="/assets/css/register.css">
    <link rel="stylesheet" href="/assets/css/rcircle.css">
</head>

<body>
    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <div class="success"><?php echo htmlspecialchars($_GET['success']); ?></div>
    <?php endif; ?>

    <div class="registerContainer">

    <form class="formRegister" action="/register-process" method="POST" enctype="multipart/form-data" id="registerForm">
    <h1 id="rTitulo">REGISTRARSE</h1>

    <div class="form-grid">
        <div class="form-group">
            <label class="lbReg">Nombre completo:</label>
            <input class="ipReg" type="text" id="nombreReg" name="nombre_completo" placeholder="Nombre completo" required>
            <span class="error-msg" id="error-nombre"></span>
        </div>

        <div class="form-group">
            <label class="lbReg">Fecha de nacimiento:</label>
            <input class="ipReg" type="date" name="fecha_nacimiento" id="fechaNacimiento" required>
            <span class="error-msg" id="error-fecha"></span>
        </div>

        <div class="form-group">
            <label class="lbReg">Género:</label>
            <select class="ipReg" name="genero" id="generoReg" required>
                <option value="Sin seleccionar">Sin seleccionar</option>
                <option value="Mujer">Mujer</option>
                <option value="Hombre">Hombre</option>
                <option value="Otros">Otros</option>
            </select>
            
        </div>

        <div class="form-group">
            <label class="lbReg">País:</label>
            <input class="ipReg" type="text" name="pais" id="paisReg" placeholder="País" required>
          
        </div>

        <div class="form-group">
            <label class="lbReg">Nacionalidad:</label>
            <input class="ipReg" type="text" name="nacionalidad" id="nacionalidad" placeholder="Nacionalidad" required>
           
        </div>

        <div class="form-group">
            <label class="lbReg">Correo electrónico:</label>
            <input class="ipReg" type="email" name="correo" id="correo" placeholder="Correo electrónico" required>
            
        </div>

        <div class="form-group">
            <label class="lbReg">Contraseña:</label>
            <input class="ipReg" type="password" name="contraseña" id="contraReg" placeholder="Contraseña" required>
          
        </div>

        <div class="form-group">
            <label class="lbReg">Rol:</label>
            <select class="ipReg" name="rol" id="rol">
                <option value="Ninguno">Ninguno</option>
                <option value="Operador">Operador</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>

        <div class="form-group file-input-group">
            <label class="lbReg">Elegir foto de perfil:</label>
            <div class="custom-file-input">
                <input type="file" name="foto" id="foto" accept="image/jpeg,image/png,image/gif" class="file-input">
                <label for="foto" class="custom-file-label">
                    <span class="file-icon"><ion-icon name="folder-open"></ion-icon></span>
                    <span class="file-text">Seleccionar archivo</span>
                </label>
                <span class="file-name" id="file-name">No se ha seleccionado ningún archivo</span>
            </div>
            <span class="error-msg" id="error-foto"></span>
        </div>
    </div>

    <button class="btnRegister" type="submit">Registrarse</button>
</form>

        <p>¿Ya tienes cuenta? <a href="/">Inicia sesión aquí</a></p>
    </div>



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
    </div>



    <script src="/assets/js/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>

</html>