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
                <a href="/main" class="iconos_link me-3" title="Página Principal">
                    <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>
        
            <div class="col iconos d-flex justify-content-end align-items-center">
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
        <div class=".container-fluid body_main">
            <div class="row  d-flex align-items-center apartado_Usuario">
                <div class="col-5 d-flex justify-content-end foto_usuario">
                    <img src="/assets/image/Kendrick Lamar.jpg" class="fotito_perfil"
                    style="
                    height: 200px;
                    width: 200px;">
                </div>

                <div class="col-7 info_usuario">
                    <p class="nomUsu" style="font-size: 30px;">kendrick.lamar95</p>
                </div>
            </div>

            <div class="col">
                <h1 class="text-center" id="title_page" style="margin-bottom: 10px;font-size: 40px;">REPORTE DE LIKES Y COMENTARIOS</h1>
                <div class="row d-flex flex-column-reverse align-items-center contenedorReporte">
                    <div class="col d-flex containerREP" style="color:aliceblue">
                        <p style="width: 80%;">Pelé:La Leyenda</p>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/like.png">
                            <p>26</p>
                        </div>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/Message circle.png">
                            <p>26</p>
                        </div>
                        
                    </div>
                    <div class="col d-flex containerREP" style="color:aliceblue">
                        <p style="width: 80%;">Pelé:La Leyenda</p>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/like.png">
                            <p>26</p>
                        </div>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/Message circle.png">
                            <p>26</p>
                        </div>
                        
                    </div>
                    <div class="col d-flex containerREP" style="color:aliceblue">
                        <p style="width: 80%;">Pelé:La Leyenda</p>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/like.png">
                            <p>26</p>
                        </div>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/Message circle.png">
                            <p>26</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>