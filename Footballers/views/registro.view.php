<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <link rel="stylesheet" href="/assets/css/alerts.css" />

</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-center vh-100" id="componentes_body_index">
            <div class="col-4 position-relative" id="left-panel">
                <div class="half-circle">
                    <div class="circle-container"></div>
                    <div class="circle-container2"></div>
                </div>
                <div class="logo-text text-white">
                    footballers
                </div>
            </div>


            <?php if (isset($_GET['error'])): ?>
                <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="success"><?php echo htmlspecialchars($_GET['success']); ?></div>
            <?php endif; ?>

            <form class="col" id="form_IS" action="\registro-process" method="POST" enctype="multipart/form-data" style="margin: 60px; margin-top: 0px;">
                <h1 class="text-center" id="title_page" style="margin-bottom: 10px;">REGISTRO</h1>

                <!-- Nombre Completo -->
                <div class="mb-1" id="forms">
                    <label for="input_NomCom" class="form-label" id="label_text" style="font-size: larger;">Nombre Completo:</label>
                    <input type="text" class="form-control" id="input_NomCom" name="input_NomCom" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px;">
                </div>

                <!-- Nombre de Usuario -->
                <div class="mb-1" id="forms">
                    <label for="input_NomUsu" class="form-label" id="label_text" style="font-size: larger;">Nombre del Usuario:</label>
                    <input type="text" class="form-control" id="input_NomUsu" name="input_NomUsu" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px;">
                </div>


                <!-- Género y rol -->
                <div class="mb-1" id="forms" style="display: flex; margin-right: 5px;">

                    <div class="col-5">
                        <label for="genero" class="form-label" id="label_text" style="font-size: larger;">Género:</label>
                        <select name="genero" id="input_Genero" class="form-select" aria-label="Default select example" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 10px; font-size: 15px; margin: 5px; border-radius: 25px; width: 300px;">
                            <option value="Sin seleccionar">Selecciona un género</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Otros">Otros</option>
                            <option value="Prefiero no decir">Prefiero no decir</option>
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="rol" class="form-label" id="label_text" style="font-size: larger;">Rol:</label>
                        <select name="input_Rol" id="input_Rol" class="form-select" aria-label="Default select example" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 10px; font-size: 15px; margin: 5px; border-radius: 25px; width: 300px;">
                            <option value="Ninguno">Ninguno</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Operador">Operador</option>

                        </select>
                    </div>
                </div>

                <!-- Fecha de Nacimiento y Nacionalidad -->
                <div class="mb-1" id="forms" style="display: flex; margin-right: 5px;">
                    <div class="col-5">
                        <label for="fechaNacimiento" class="form-label" id="label_text" style="font-size: larger;">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="input_fechaNac" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 300px;">
                    </div>

                    <div class="col-5">
                        <label for="nacionalidad" class="form-label" id="label_text" style="font-size: larger;">Nacionalidad:</label>
                        <select name="nacionalidad" id="nacionalidad" class="form-select" aria-label="Default select example" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 10px; font-size: 15px; margin: 5px; border-radius: 25px; width: 300px;">
                            <option value="">Selecciona tu nacionalidad</option>
                            <option value="México">México</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                            <option value="Canadá">Canadá</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Colombia">Colombia</option>
                            <option value="España">España</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Chile">Chile</option>
                            <option value="Perú">Perú</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-1" id="forms">
                    <label for="correo" class="form-label" id="label_text" style="font-size: larger;">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" name="input_Correo" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px;">


                </div>

            
                <!-- Contraseña  y Foto-->
                <div id="forms" class="mb-1" style="width: 700px;">
                    <label for="contraReg" class="form-label" id="label_text" style="font-size: larger;">Contraseña:</label>
                    <input type="password" name="input_Contra" id="contraReg" class="form-control" aria-describedby="passwordHelpBlock" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 10px; border-radius: 25px;">
                    <div id="passwordHelpBlock" class="form-text" style="color: rgb(67, 67, 67); margin-top: 15px; margin-bottom: 15px;">
                        Tu contraseña debe contener mínimo 8 caracteres, al menos una mayúscula, una minúscula y un número.
                    </div>

                    <!-- Foto de Perfil -->
                    <label for="input_foto" class="form-label" id="label_text" style="font-size: larger; margin-top: 15px;">Foto de perfil:</label>
                    <input type="file" class="form-control" id="input_foto" name="input_foto" accept="image/jpeg, image/png, image/gif" style="background-color: #6100E9; border: none; height: 60px; color: white; padding: 20px; padding-left: 30px; font-size: 15px; margin: 10px; border-radius: 25px; width: 530px;">
                    <span id="file-name" style="color: white; margin-left: 10px; display: block; margin-top: 5px;">No se ha seleccionado ningún archivo</span>
                    <small style="color: #ccc; margin-left: 10px;">Formatos permitidos: JPG, PNG, GIF (Máx. 5MB)</small>


                    <!-- Botón de Registro -->
                    <input class="btn btn-primary" type="submit" value="Registrarse" id="btn_IS" style="background-color: #D60004; border: none; margin: 25px; margin-left: 280px; padding: 10px 30px; font-size: 18px; border-radius: 25px;">

                    <!-- Enlace para iniciar sesión -->
                    <br>
                    <a href="/" style="margin-top: 15px;">
                        Ya tengo cuenta
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="/assets/js/registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>