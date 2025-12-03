<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>footballers</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/Pantallas_PIA/styles.css" />
    </head>
    <header class="main_header" style="position: static;">
        <div class="row align-items-center" id="componentes_header">
            <div class="col align-items-center">
                <a href="/Pantallas_PIA/main.html" class="iconos_link me-3" title="Página Principal">
                    <img src="/Pantallas_PIA/assets/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>

            <div class="col d-flex nav_bar align-items-center justify-content-center" >
                <form class="d-flex" role="search">
                    <input class="form-control me-2 barraNav" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success btn_Nav" type="submit"><img class="iconos_img" src="/assets/iconos/Search.png"></button>
                </form>

            </div>
        
            <div class="col iconos d-flex justify-content-end">
                <a href="/Pantallas_PIA/ReporteLikes.html" class="iconos_link me-3" title="Reporte de Likes">
                    <img src="/Pantallas_PIA/assets/iconos/favorite.png" class="float-end iconos_img" alt="icono de likes">
                </a>

                <a href="/Pantallas_PIA/MisPublicaciones.html" class="iconos_link me-3" title="Mis Publicaciones">
                    <img src="/Pantallas_PIA/assets/iconos/notifications.png" class="float-end iconos_img" alt="icono de notificaciones">
                </a>

                <a href="/Pantallas_PIA/CrearPublicacion.html" class="iconos_link me-3" title="Crear Nuevo Post">
                    <img src="/Pantallas_PIA/assets/iconos/Plus square.png" class="float-end iconos_img" alt="icono de nuevo post">
                </a>

                <a href="/Pantallas_PIA/PerfilUsuario.html" class="iconos_link me-3" title="Perfil de Usuario">
                    <img src="/Pantallas_PIA/assets/iconos/person (1).png" class="float-end iconos_img" alt="icono de usuario">
                </a>
            </div>
        </div>
    </header>
    <body>
        <div class=".container-fluid body_main">
            <div class="row ">
                <div class="col-6  align-content-center cont_Public">
                    <img src="/Pantallas_PIA/assets/pele.jpg" class="img-fluid multiPublic">
                </div>

                <div class="col-6 d-flex info_Public" style="flex-direction: column;">
                    <div class="col d-flex align-items-center mundial_Public">
                        <p id="NameMundial_Public" style="padding-right: 8px;">MEXICO</p>
                        <p id="YearMundial_Public">1970</p>
                    </div>

                    <div class="col d-flex align-items-center">
                        <img class="foto_User_Public" src="/Pantallas_PIA/assets/Kendrick Lamar.jpg">
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
                            <img class="iconos_reporte" src="/Pantallas_PIA/assets/iconos/like.png">
                            <p id="contador_likesPublic">26</p>

                            <img class="iconos_reporte" src="/Pantallas_PIA/assets/iconos/Message circle.png">
                            <p id="contador_likesPublic">26</p>
                        </div>
                    </div>

                    <div class="col d-flex float-end comentariosPublicADMIN" style="flex-direction: column;">
                        
                        <div class="col d-flex comentarios_Public">
                            <div class="col flex-grow-1 espacio_comentarioAdmin" >
                                <p class="nomUser_comment">sam.palacios09</p>
                                <p class="contenUser_comment">Toda una leyenda, te amo Pelé!!</p>
                            </div>
                            <div class="col d-flex justify-content-end align-content-center">
                                <button class="boton_eliminarPubli" name="boton_eliminarPubli">Eliminar</button>
                            </div>

                        </div>

                        <div class=" col d-flex comentarios_Public">
                            <div class="col flex-grow-1 espacio_comentarioAdmin">
                                <p class="nomUser_comment">damiian_carranza16</p>
                                <p class="contenUser_comment">Sin duda alguna es una leyenda, pero el mejor jugador del mundo es Messi. </p>
                            </div>
                            <div class="col d-flex justify-content-end ">
                                <button class="boton_eliminarPubli" name="boton_eliminarPubli">Eliminar</button>
                            </div>
                            
                        </div>
                        
                        <div class="col d-flex comentarios_Public">
                            <div class="col flex-grow-1 espacio_comentarioAdmin">
                                <p class="nomUser_comment">jazmin.ch2003</p>
                                <p class="contenUser_comment">A próxima Copa do Mundo é do Brasil!!</p>
                            </div>
                            <div class="col d-flex justify-content-end ">
                                <button class="boton_eliminarPubli" name="boton_eliminarPubli">Eliminar</button>
                            </div>
                            
                        </div>
                    </div>

                    
                </div>


            </div>
        </div>
    </body>
</html>