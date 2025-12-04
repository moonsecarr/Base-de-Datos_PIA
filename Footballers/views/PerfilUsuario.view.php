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
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role = $_SESSION['session_rol'];

if ($role === 'Administrador') {

    require 'views/partials/headerAdmi.php';
} else {

    require 'views/partials/header.php';
}

?>

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


          
            <?php
           
            use Core\Database;

            $config = require 'core/config.php';
            $db = new Database($config);
            $id =  $_SESSION['session_id'];
          
          
            $stmt = $db->query("CALL getPublicacionId(?)",[$id]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            $stmt->closeCursor(); 
            
            
            
            foreach ($rows as $row) {
                
                $mime = $row['mime_type'] ?? '';
                $src = '';

                if (!empty($row['multimedia'])) {
                    $data = base64_encode($row['multimedia']);
                    $src = "data:$mime;base64,$data";
                }


                // Prepara el bloque multimedia según el tipo
                if ($mime !== '' && strpos($mime, 'image') !== false) {
                    $multimediaHtml = "<img class='img-fluid multimedia_MP' src='$src' />";
                } elseif ($mime !== '' && strpos($mime, 'video') !== false) {
                    $multimediaHtml = "<video class='multimedia_MP w-50 mx-auto d-block 'controls>
                              <source src='$src' type='$mime'>
                           </video>";
                } else {
                    $multimediaHtml = "<img class='img-fluid multimedia_MP' src='/assets/image/pele.jpg' />";
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


        </div>


    </div>
</body>

</html>