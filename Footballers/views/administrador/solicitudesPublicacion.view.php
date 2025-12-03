<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>footballers</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/solicitudPublicacion.css" />
</head>

<header class="main_header" style="position: static;">
    <div class="row" id="componentes_header">
        <div class="col align-items-center">
            <a href="/administrador/main" class="iconos_link me-3" title="Página Principal">
                <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
            </a>
        </div>

        <div class="col iconos d-flex justify-content-end align-items-center">
            <a href="/crearMundial" class="iconos_link me-3" title="Crear mundiales">
                <img src="/assets/iconos/earth.png" class="float-end iconos_img" alt="icono de likes">
            </a>

            <a href="/crearCategorias" class="iconos_link me-3" title="Crear categorias">
                <img src="/assets/iconos/category.png" class="float-end iconos_img" alt="icono de notificaciones">
            </a>

            <a href="/solicitudesPublicacion" class="iconos_link me-3" title="Solicitudes de publicaciones">
                <img src="/assets/iconos/notifications.png" class="float-end iconos_img" alt="icono de nuevo post">
            </a>

            <a href="/perfilUsuario" class="iconos_link me-3" title="Perfil de Usuario">
                <img src="/assets/iconos/person (1).png" class="float-end iconos_img" alt="icono de usuario">
            </a>
        </div>
    </div>
</header>

<body>
    <div class=".container-fluid body_main">

        <div class="col">
            <h1 class="text-center" id="title_page" style="margin-bottom: 10px;font-size: 40px;">SOLICITUD DE PUBLICACIONES</h1>

            <?php

            use Core\Database;

            $config = require 'core/config.php';
            $db = new Database($config);

            // Llamada a tu procedimiento almacenado
            $stmt = $db->query("CALL getMundiales()");

            // Obtener resultados como array asociativo
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
                $imgData = base64_encode($row['logotipo']);
                $src = 'data:image/jpeg;base64,' . $imgData;

                echo '
                 <div class="row justify-content-center gx-4 gy-4">


                <div class="col-12 col-md-4 contenedorMP">

                    <div class="publicacion-card">
                        <!-- 1. Título de Usuario (Usuario + Estado) -->
                        <div class="card-header-mp">
                            <p class="NamePubli_MP" name="NamePubli_MP">Pelé: leyenda del Mundial</p>
                        </div>

                        <!-- 2. Imagen -->
                        <div class="card-image-mp">
                            <img class="img-fluid multimedia_MP" src="/assets/image/pele.jpg">
                        </div>

                        <!-- 3. Descripción -->
                        <div class="card-description-mp">
                            <p>El verdadero protagonista del mundial de México 1970 sin duda algun afue Pelé, mi ídolo.</p>
                        </div>

                        <!-- 4. Botón de Estado (Ejemplo de "Aprobada") -->
                        <div class="col d-flex justify-content-center card-footer-mp">
                            <button class="estado-publi" style="background-color: #01C755;">Aprobar</button>

                            <button class="estado-publi" style="background-color: #D60004;">Rechazar</button>
                        </div>
                    </div>

                </div>


            </div>';
            }
            ?>
           
        </div>
    </div>
</body>

</html>