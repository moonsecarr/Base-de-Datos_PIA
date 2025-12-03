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
            <div class="row ">

                <div class="col-6  align-items-center cont_Public">
                    <img src="/assets/image/pele.jpg" class="img-fluid multiPublic">

                </div>

                <div class="col-6 d-flex info_Public" style="flex-direction: column;">
                    <div class="col d-flex align-items-center mundial_Public">
                        <p id="NameMundial_Public" style="padding-right: 8px;">MEXICO</p>
                        <p id="YearMundial_Public">1970</p>
                    </div>

                    <div class="col d-flex align-items-center">
                        <img class="foto_User_Public" src="/assets/image/Kendrick Lamar.jpg">
                        <p class="name_User_Public">kendrick.lamar95</p>
                    </div>

                    <div class="col Titulo_Desc_Public">
                        <p class="titulo_public">Pelé: leyenda del Mundial</p>
                        <p class="desc_public">El verdadero protagonista del mundial de México 1970 sin duda alguna fue Pelé, mi ídolo.</p>
                    </div>

                    <div class="col etiquetaPublic"> 
                        <p class="etiqPublic">Leyendas</p>
                    </div>

                    <div class="row d-flex justify-content-center align-content-center contenedor_LikesComents" style="margin-bottom: 20px;">
                        <div class="col d-flex IconoContador">
                            <img class="iconos_reporte" src="/assets/iconos/like.png">
                            <p id="contador_likesPublic">26</p>

                            <img class="iconos_reporte" src="/assets/iconos/Message circle.png">
                            <p id="contador_likesPublic">26</p>
                        </div>
                    </div>

                    <div class="col d-flex float-end comentariosPUblic" style="flex-direction: column;">
                        <div class="comentarios_Public">
                            <p class="nomUser_comment">sam.palacios09</p>
                            <p class="contenUser_comment">Toda una leyenda, te amo Pelé!!</p>
                        </div>

                        <div class="comentarios_Public">
                            <p class="nomUser_comment">damiian_carranza16</p>
                            <p class="contenUser_comment">Sin duda alguna es una leyenda, pero el mejor jugador del mundo es Messi. </p>
                        </div>
                        
                        <div class="comentarios_Public">
                            <p class="nomUser_comment">jazmin.ch2003</p>
                            <p class="contenUser_comment">A próxima Copa do Mundo é do Brasil!!</p>
                        </div>
                    </div>

                    <!-- Aplicamos d-flex y alineamos items-center -->
                    <div class="contenedor_barraComent d-flex align-items-center">
                        <!-- El input ocupa la mayor parte del espacio -->
                        <input 
                            type="text" 
                            class="input-comentario flex-grow-1" 
                            id="input_Comentario" 
                            name="input_Comentario" 
                            placeholder="Comenta algo..."
                        >
                        <!-- Botón de Envío (con el icono) -->
                        <button class="btn-enviar-coment">
                            <!-- Icono de Enviar (avión de papel) -->
                            <img src="assets/iconos/Send.png" alt="Enviar">
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </body>
</html>