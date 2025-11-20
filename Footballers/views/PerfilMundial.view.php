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
                <!---------------------- CAMBIAR LA RUTA --------------------------------------->
                <a href="/Pantallas_PIA/main.html" class="iconos_link me-3" title="Página Principal">
                    <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>
        
            <div class="col iconos d-flex justify-content-end align-items-center">
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
            <div class="row  d-flex align-items-center apartado_Usuario">
                <div class="col-5 d-flex justify-content-end foto_usuario">
                    <img src="/Pantallas_PIA/assets/uruguay.jpg" class="fotito_perfil_Mundial">
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

            <div class="row gx-1 gy-1 mt-4 contenedor_publicaciones" style="margin: 2px;">
                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi" src="/Pantallas_PIA/assets/uruguay.jpg">
                    </div>                  
                </div>

                <div class="col-6 col-md-3 mundial_card" >
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi" src="/Pantallas_PIA/assets/italia 1934.jpg">
                    </div>                    
                </div>

                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi"  src="/Pantallas_PIA/assets/inglaterra 1966.jpeg">
                    </div>
                </div>

                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi"  src="/Pantallas_PIA/assets/brasil 1950.webp">
                    </div>
                </div>

                <div class="col-6 col-md-3 mundial_card">
                    <div class="img_public_card">
                        <img class="img-fluid imagen_publi"  src="/Pantallas_PIA/assets/suiza 1954.jpg">
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>