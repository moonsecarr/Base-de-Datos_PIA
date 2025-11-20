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
                <a href="/main.html" class="iconos_link me-3" title="Página Principal">
                    <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>
        
            <div class="col iconos d-flex justify-content-end align-items-center">
                <a href="/ReporteLikes.html" class="iconos_link me-3" title="Reporte de Likes">
                    <img src="/assets/iconos/favorite.png" class="float-end iconos_img" alt="icono de likes">
                </a>

                <a href="/MisPublicaciones.html" class="iconos_link me-3" title="Mis Publicaciones">
                    <img src="/assets/iconos/notifications.png" class="float-end iconos_img" alt="icono de notificaciones">
                </a>

                <a href="/CrearPublicacion.html" class="iconos_link me-3" title="Crear Nuevo Post">
                    <img src="/assets/iconos/Plus square.png" class="float-end iconos_img" alt="icono de nuevo post">
                </a>

                <a href="/PerfilUsuario.html" class="iconos_link me-3" title="Perfil de Usuario">
                    <img src="/assets/iconos/person (1).png" class="float-end iconos_img" alt="icono de usuario">
                </a>
            </div>
        </div>
    </header>
    <body>
        <div class=".container-fluid body_main">
            <div class="row  d-flex align-items-center apartado_Usuario">
                <div class="col-5 d-flex justify-content-end foto_usuario">
                    <img src="/assets/image/Kendrick Lamar.jpg" class="fotito_perfil">
                </div>

                <div class="col-7 info_usuario">
                    <p class="nomUsu">kendrick.lamar95</p>
                    <p class="etiqPais">México</p>
                    <a href="/EditarPerfil.html" class="btn_editPer">Editar perfil</a>
                </div>
            </div>

            <div class="row gx-1 gy-1 mt-4 contenedor_publicaciones" style="margin: 2px;">
                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi" src="/assets/image/uruguay.jpg">
                    </div>                  
                </div>

                <div class="col-6 col-md-3 mundial_card" >
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi" src="/assets/image/italia 1934.jpg">
                    </div>                    
                </div>

                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi"  src="/assets/image/inglaterra 1966.jpeg">
                    </div>
                </div>

                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi"  src="/assets/image/brasil 1950.webp">
                    </div>
                </div>

                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi"  src="/assets/image/suiza 1954.jpg">
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>