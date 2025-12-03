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
        <div class="col">

            <form id="form_Categoria" action="/categoria-process" method="POST" enctype="multipart/form-data">

                <h1 class="text-center" id="title_page" style="margin-bottom: 40px;font-size: 40px;">CATEGORÍAS</h1>
                <div class="col d-flex flex-column contenedorNewCat">
                    <div class="col d-flex">
                        <label style="width: 40%;" name="name_categoria">NUEVA CATEGORÍA:</label>
                        <input type="text" class="form-control input_newCat" name="input_newCat" placeholder="" style="margin-right: 20px;">
                        <input class="btn btn-primary" type="submit" value="Crear" id="btn_CrearCat" name="btn_CrearCat" style="background-color: #D60004;">
                    </div>



                </div>
            </form>

            <?php
            
            session_start();
            use Core\Database;

            $config = require 'core/config.php';
            $db = new Database($config);
           
            $idUsuario = $_SESSION['session_id'];
            // Llamada a tu procedimiento almacenado
            $stmt = $db->query("CALL getCategoriasPorUsuario($idUsuario)");

            // Obtener resultados como array asociativo
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {

                // checked si estado = 1
                $checked = $row['estado'] == 1 ? 'checked' : '';
                echo ' 
                 <div class="row d-flex flex-column align-items-center contenedorCat">
                <div class="col d-flex containerCAT" style="color:aliceblue">
                    <p style="width: 100%;" name="name_categoria">'. $row['nombreCategoria'] . '</p>

                     <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" 
                       data-id="' . $row['idCategoria'] . '" ' . $checked . '>
                   </div>

                </div>


            </div>';
            }
            ?>


        </div>
    </div>



    <script src="/assets/js/categoria.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>