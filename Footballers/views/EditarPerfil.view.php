<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>footballers</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <link rel="stylesheet" href="/assets/css/alerts.css">
</head>
<header class="main_header" style="position: static;">
    <div class="row align-items-center" id="componentes_header">
        <div class="col align-items-center">
            <a href="/main" class="iconos_link me-3" title="Página Principal">
                <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
            </a>
        </div>

        <div class="col d-flex nav_bar align-items-center justify-content-center" >
                <form class="d-flex" role="search">
                    <input class="form-control me-2 barraNav" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success btn_Nav" type="submit"><img class="iconos_img" src="/assets/iconos/Search.png"></button>
                </form>

        </div>


        <div class="col iconos d-flex justify-content-end">
            <a href="/reporteLike" class="iconos_link me-3" title="Reporte de Likes">
                <img src="/assets/iconos/favorite.png" class="float-end iconos_img" alt="icono de likes">
            </a>

            <a href="/misPublicaciones" class="iconos_link me-3" title="Mis Publicaciones">
                <img src="/assets/iconos/notifications.png" class="float-end iconos_img" alt="icono de notificaciones">
            </a>

            <a href="/crearPublicacion" class="iconos_link me-3" title="Crear Nuevo Post">
                <img src="/assets/iconos/Plus square.png" class="float-end iconos_img" alt="icono de nuevo post">
            </a>

            <a href="/perfilUsuario" class="iconos_link me-3" title="Perfil de Usuario">
                <img src="/assets/iconos/person (1).png" class="float-end iconos_img" alt="icono de usuario">
            </a>
        </div>
    </div>
</header>

<body>

    <form id="editForms" method="POST" enctype="multipart/form-data">

        <div class=".container-fluid body_main">
            <div class="row  d-flex align-items-center">



                <div class="col-6" id="form_IS" style="margin: 0px; margin-top: 0px;">
                    <h1 class="text-center titulo_EP" style="margin-bottom: 10px;">Editar Perfil</h1>
                    <div class="mb-1 forms_EP">


                        <!--  //*Nombre completo -->
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Nombre Completo:</label>
                        <input type="text" class="form-control inputs_Edit" id="input_Usuario_IS" name="input_NomCom"
                            value="<?= htmlspecialchars($_SESSION['session_nomCom'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                        <!--  //*Nombre de usuario -->
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Nombre del Usuario:</label>
                        <input type="text" class="form-control inputs_Edit" id="input_Usuario_IS" name="input_NomUsu"
                            value="<?= htmlspecialchars($_SESSION['session_nickname'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                        <!-- //*Fecha de nacimiento -->
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control inputs_Edit" id="input_Usuario_IS" name="input_fechaNac"
                            value="<?= htmlspecialchars($_SESSION['session_fecha'] ?? '', ENT_QUOTES, 'UTF-8') ?>">


                        <!--  //*Nacionalidad -->
                        <label for="input_Nacionalidad" class="form-label" id="label_text" style="font-size: larger;">
                            Nacionalidad:
                        </label>
                        <select
                            class="form-select"
                            id="input_Nacionalidad"
                            name="input_Nacionalidad"
                            style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 10px; font-size: 15px; margin: 5px; border-radius: 25px; width: 300px;">
                            <option value="" disabled <?= empty($_SESSION['session_nacionalidad']) ? 'selected' : '' ?>>Abrir el menú</option>
                            <option value="México" <?= ($_SESSION['session_nacionalidad'] ?? '') === 'México' ? 'selected' : '' ?>>México</option>
                            <option value="Estados Unidos" <?= ($_SESSION['session_nacionalidad'] ?? '') === 'Estados Unidos' ? 'selected' : '' ?>>Estados Unidos</option>
                            <option value="Cánada" <?= ($_SESSION['session_nacionalidad'] ?? '') === 'Cánada' ? 'selected' : '' ?>>Cánada</option>
                        </select>

                        <!--  //*Correo -->
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Correo:</label>
                        <input type="email" class="form-control inputs_Edit" id="input_Usuario_IS" name="input_Correo"
                            value="<?= htmlspecialchars($_SESSION['session_correo'] ?? '', ENT_QUOTES, 'UTF-8') ?>">


                        <!--  //*Contraseña -->
                        <label for="input_Contra" class="form-label" id="label_text" style="font-size: larger;">Contraseña</label>
                        <input type="text" id="input_Contra" name="input_Contra"  class="form-control inputs_Edit" aria-describedby="passwordHelpBlock" value="<?= htmlspecialchars($_SESSION['session_contra'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        <div id="passwordHelpBlock" class="form-text" style="color: rgb(67, 67, 67); margin-top: 15px; margin-bottom: 15px;">
                            Tú contraseña debe contener mínimo 8 caracteres, sin carácteres
                            especiales ni emojis.
                        </div>

                        <!--  //*Boton de guardar  -->
                        <input class="btn btn-primary btn_EditP" type="submit" value="Guardar cambios" id="btn_EditP">

                    </div>
                </div>

                <?php
                //*Convertir el blob a base64
                $fotoBlob = $_SESSION['session_foto'] ?? null;
                $fotoBase64 = $fotoBlob ? 'data:image/jpeg;base64,' . base64_encode($fotoBlob) : '/assets/image/default.jpg';
                ?>

                <div class="col-6 d-flex justify-content-center align-items-center foto_usuario" style="flex-direction: column;">
                    <div>
                        <img
                            src="<?= $fotoBase64 ?>"
                            class="fotito_perfil_EP"
                            alt="Foto de perfil">
                    </div>

                    <div>
                        <label for="file-upload" class="btn btn-primary boton-subir-foto">Cambiar foto de perfil</label>
                        <input type="file" id="file-upload" name="input_Foto" accept="image/*" style="display: none;">

                        <!-- Aquí se mostrará el nombre -->
                        <p id="file-name" style="color:#B1E804ff;padding-left:24px">No se ha seleccionado ningún archivo</p>
                    </div>
                </div>




            </div>



        </div>

    </form>
    <script src="/assets/js/editarPerfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>