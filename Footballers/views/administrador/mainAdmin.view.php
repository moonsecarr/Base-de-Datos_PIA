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
        <div class="row align-items-center" id="row_mundiales">
            <div class="col">
                MUNDIALES
            </div>
        </div>

        <div class="row align-items-center gx-2 gy-2" style="margin: 2px;">
            <!-- <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center">

                <div class="img_mundial_card">
                    <a href="/perfilMundial">
                        <img class="img-fluid imagen_mundi" src="/assets/image/uruguay.jpg">
                    </a>
                </div>

                <div class="name_mundial_card d-flex justify-content-between align-items-cente">
                    <p name="nombreMundial" class="float-start nombreMundial">URUGUAY</p>
                    <p name="yearMundial" class="nombreMundial">1930</p>
                </div>


            </div> -->

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
            <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center">
                    <div class="img_mundial_card">
                        <a href="/perfilMundial">
                            <img class="img-fluid imagen_mundi" src="' . $src . '">
                        </a>
                    </div>
                    <div class="name_mundial_card d-flex justify-content-between align-items-center">
                        <p class="float-start nombreMundial">' . $row['nombre'] . '</p>
                        <p class="nombreMundial">' . $row['año'] . '</p>
                    </div>
            </div>';
            }
            ?>




        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>