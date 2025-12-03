<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>footballers</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css" />
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
            <a href="/reportesLikes" class="iconos_link me-3" title="Reporte de Likes">
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
    <div class=".container-fluid body_main">

        <?php

        // Foto
        $fotoBlob   = $_SESSION['session_foto'] ?? null;
        $fotoBase64 = $fotoBlob ? 'data:image/jpeg;base64,' . base64_encode($fotoBlob) : '/assets/image/default.png';

        // Nickname y nacionalidad desde la sesión
        $nickname     = $_SESSION['session_nickname']     ?? 'Usuario';
        $nacionalidad = $_SESSION['session_nacionalidad'] ?? 'Sin país';
        ?>

        <!--  //*Foto -->
        <div class="row  d-flex align-items-center apartado_Usuario">
            <div class="col-5 d-flex justify-content-end foto_usuario">
                <img src="<?= $fotoBase64 ?>" class="fotito_perfil">
            </div>

            <!--  //*usuario , nacionalidad -->
            <div class="col-7 info_usuario">
                <p class="nomUsu"><?= htmlspecialchars($nickname) ?></p>

                <div class="d-flex align-items-center gap-2">
                    <p class="etiqPais"><?= htmlspecialchars($nacionalidad) ?></p>
                    <form action="/logout" method="post">
                        <button type="submit" class="cerrarSesion">Cerrar sesión</button>
                    </form>
                   
                </div>
                <a href="/editarPerfil" class="btn_editPer">Editar perfil</a>
            </div>
        </div>

        <div class="row gx-1 gy-1 mt-4 contenedor_publicaciones" style="margin: 2px;">
            <div class="col-6 col-md-3 mundial_card">
                <div class="img_public_card">
                    <img class="img-fluid imagen_publi" src="/assets/image/uruguay.jpg">
                </div>
            </div>

            <div class="col-6 col-md-3 mundial_card">
                <div class="img_public_card">
                    <img class="img-fluid imagen_publi" src="/assets/image/italia 1934.jpg">
                </div>
            </div>

            <div class="col-6 col-md-3 mundial_card">
                <div class="img_public_card">
                    <img class="img-fluid imagen_publi" src="/assets/image/inglaterra 1966.jpeg">
                </div>
            </div>

            <div class="col-6 col-md-3 mundial_card">
                <div class="img_public_card">
                    <img class="img-fluid imagen_publi" src="/assets/image/brasil 1950.webp">
                </div>
            </div>

            <div class="col-6 col-md-3 mundial_card">
                <div class="img_public_card">
                    <img class="img-fluid imagen_publi" src="/assets/image/suiza 1954.jpg">
                </div>
            </div>

        </div>
    </div>
</body>

</html>