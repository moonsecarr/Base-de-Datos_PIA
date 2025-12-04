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
            <a href="/administrador/main" class="iconos_link me-3" title="Página Principal">
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
        <!--         <div class="row  d-flex align-items-center apartado_Usuario">
            <div class="col-5 d-flex justify-content-end foto_usuario">
                <img src="/assets/image/uruguay.jpg" class="fotito_perfil_Mundial">
            </div>

            <div class="col-7 info_usuario">
                <p class="nomMundial" id="nomMundial">URUGUAY 1930</p>
                <p class="desMundial" id="desMundial">El Mundial de "Uruguay 1930" fue la primera Copa del Mundo organizada por la FIFA y se celebró en Montevideo. Participaron 13 selecciones, principalmente de América y Europa, con partidos disputados en el Estadio Centenario. La final enfrentó a Uruguay y Argentina, en un duelo lleno de rivalidad y emoción. Uruguay ganó 4-2, convirtiéndose en el primer campeón mundial de fútbol.</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center estadísticas_Mundial">
            <div class="col-2 d-flex justify-content-center align-items-center apartado_Esta">
                <p class="etiq_estadis">Campeón</p>
                <p class="name_campeon" name="campeon">Uruguay</p>
            </div>

            <div class="col-2 d-flex justify-content-center align-items-center apartado_Esta">
                <p class="etiq_estadis">Subcampeón</p>
                <p class="name_campeon" name="subcampeon">Argentina</p>
            </div>

            <div class="col-2 d-flex justify-content-center align-items-center apartado_Esta">
                <p class="etiq_estadis">Mayor goleador</p>
                <p class="name_campeon" name="goleador">Pelé</p>
            </div>

            <div class="col-2 d-flex justify-content-center align-items-center apartado_Esta">
                <p class="etiq_estadis">MVP</p>
                <p class="name_campeon" name="mvp">Pelé</p>
            </div>
        </div>

 -->
        <?php

        use Core\Database;

        $config = require 'core/config.php';
        $db = new Database($config);
        
        $id = $_GET['idMundial'] ?? null;
        if ($id) {
            $stmt = $db->query("CALL getMundialPorId($id)");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $imgData = base64_encode($row['logotipo']);
            $src = 'data:image/jpeg;base64,' . $imgData;

            echo '
            <div class="row d-flex align-items-center apartado_Usuario">
                <div class="col-5 d-flex justify-content-end foto_usuario">
                    <img src="' . $src . '" class="fotito_perfil_Mundial">
                </div>
                <div class="col-7 info_usuario">
                    <p class="nomMundial">' . $row['nombre'] . ' ' . $row['año'] . '</p>
                    <p class="desMundial">' . $row['reseña'] . '</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center estadísticas_Mundial">
                <div class="col-2 apartado_Esta"><p class="etiq_estadis">Campeón</p><p>' . $row['campeon'] . '</p></div>
                <div class="col-2 apartado_Esta"><p class="etiq_estadis">Subcampeón</p><p>' . $row['subcampeon'] . '</p></div>
                <div class="col-2 apartado_Esta"><p class="etiq_estadis">Mayor goleador</p><p>' . $row['mayorGoleador'] . '</p></div>
                <div class="col-2 apartado_Esta"><p class="etiq_estadis">MVP</p><p>' . $row['MVP'] . '</p></div>
            </div>';
        }

        ?>


        <?php 

         
        $config = require 'core/config.php';
        $db = new Database($config);
        $id = $_GET['idMundial'] ?? null;
         // Llamada a tu procedimiento almacenado
        $stmt = $db->query("CALL FiltrarPublicacionesPorMundial($id)");
        
            // Obtener resultados como array asociativo
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($rows as $row) {
                
                $mime = $row['mime_type'] ?? '';
                $src = '';

                if (!empty($row['multimedia'])) {
                    $data = base64_encode($row['multimedia']);
                    $src = "data:$mime;base64,$data";
                }


                if ($mime !== '' && strpos($mime, 'image') !== false) {
                    $multimediaHtml = "<img class='img-fluid multimedia_MP' src='$src' />";
                } elseif ($mime !== '' && strpos($mime, 'video') !== false) {
                  $multimediaHtml = "<video class='multimedia_MP w-100 mx-auto d-block' controls>
                       <source src='$src' type='$mime'>
                       Tu navegador no soporta video.
                   </video>";

                } else {
                    $multimediaHtml = "<img class='img-fluid multimedia_MP  ' src='/assets/image/pele.jpg' />";
                }


                echo '
                  <div class="col-6 col-md-3 mundial_card">

                  <a href="/publicacion?idPublicacion=' . $row['idPublicacion'] . '">
                           <div class="card-image-mp">' . $multimediaHtml . '</div>
                  </a>
                    
                  </div>
                ';
            }
         ?>



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