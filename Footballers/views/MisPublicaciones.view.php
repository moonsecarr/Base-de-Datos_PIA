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
                <a href="/Pantallas_PIA/main.html" class="iconos_link me-3" title="Página Principal">
                    <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>
        
            <div class="col iconos d-flex justify-content-end align-items-center">
                <a href="/assets/iconos/ReporteLikes.html" class="iconos_link me-3" title="Reporte de Likes">
                    <img src="/assets/iconos/favorite.png" class="float-end iconos_img" alt="icono de likes">
                </a>

                <a href="/assets/iconos/MisPublicaciones.html" class="iconos_link me-3" title="Mis Publicaciones">
                    <img src="/assets/iconos/notifications.png" class="float-end iconos_img" alt="icono de notificaciones">
                </a>

                <a href="/Pantallas_PIA/CrearPublicacion.html" class="iconos_link me-3" title="Crear Nuevo Post">
                    <img src="/assets/iconos/Plus square.png" class="float-end iconos_img" alt="icono de nuevo post">
                </a>

                <a href="/Pantallas_PIA/PerfilUsuario.html" class="iconos_link me-3" title="Perfil de Usuario">
                    <img src="/assets/iconos/person (1).png" class="float-end iconos_img" alt="icono de usuario">
                </a>
            </div>
        </div>
    </header>

    <body>
        <div class=".container-fluid body_main">

            <div class="col">
                <h1 class="text-center" id="title_page" style="margin-bottom: 10px;font-size: 40px;">MIS PUBLICACIONES</h1>
                <!--<div class="col-12 col-md-3 d-flex align-items-center contenedorMP">
                    <div class="col d-flex flex-column align-items-center containerMP">
                        <p class="NamePubli_MP" name="NamePubli_MP">Pelé: leyenda del Mundial</p>

                        <img class="img-fluid multimedia_MP" id="multimedia_MP" src="/Pantallas_PIA/assets/pele.jpg">

                        <p></p>
                    </div>
                    
                    <div class="col d-flex containerREP" style="color:aliceblue">
                        <p style="width: 80%;">Pelé:La Leyenda</p>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/Pantallas_PIA/assets/iconos/like.png">
                            <p>26</p>
                        </div>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/Pantallas_PIA/assets/iconos/Message circle.png">
                            <p>26</p>
                        </div>
                        
                    </div>
                    <div class="col d-flex containerREP" style="color:aliceblue">
                        <p style="width: 80%;">Pelé:La Leyenda</p>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/Pantallas_PIA/assets/iconos/like.png">
                            <p>26</p>
                        </div>

                        <div class="col d-flex justify-content-end IconoContador">
                            <img class="iconos_reporte" src="/Pantallas_PIA/assets/iconos/Message circle.png">
                            <p>26</p>
                        </div>
                        
                    </div>
                </div>-->

                <!-- Reemplaza el bloque actual de contenedores con este ROW/COL limpio -->
            <div class="row justify-content-center gx-4 gy-4"> 
                
                <!-- 💡 CLAVE: col-12 para móvil, col-md-4 para 3 columnas en escritorio -->
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
                            <p class="estado-publi">Aprobada</p>
                        </div>
                    </div>
                    
                </div>

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
                            <p class="estado-publi">Aprobada</p>
                        </div>
                    </div>
                    
                </div>

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
                            <p class="estado-publi">Aprobada</p>
                        </div>
                    </div>
                    
                </div>
                
                </div>
            </div>
        </div>
    </body>
</html>