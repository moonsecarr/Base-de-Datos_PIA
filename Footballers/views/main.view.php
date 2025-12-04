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
            <div class="row align-items-center" id="row_mundiales">
                <div class="col palabras_Busqueda">
                    MUNDIALES
                </div>
            </div>

            <div class="row align-items-center gx-2 gy-2" style="margin: 2px;">
                <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center">
                    
                        <div class="img_mundial_card">
                            <a href="/perfilMundial">
                                <img class="img-fluid imagen_mundi" src="/assets/image/uruguay.jpg">
                            </a>
                        </div>

                        <div class="name_mundial_card d-flex justify-content-between align-items-cente">
                            <p name="nombreMundial" class="float-start nombreMundial">URUGUAY</p>
                            <p name="yearMundial" class="nombreMundial">1930</p>
                        </div>
                   
                    
                </div>

                <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center" >
                    <div class="img_mundial_card">
                        <img class="img-fluid imagen_mundi" src="/assets/image/italia 1934.jpg">
                    </div>
                    <div class="name_mundial_card d-flex justify-content-between align-items-cente">
                        <p name="nombreMundial" class="float-start nombreMundial">ITALIA</p>
                        <p name="yearMundial" class="nombreMundial">1934</p>
                    </div>
                    
                </div>

                <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center">
                    <div class="img_mundial_card">
                        <img class="img-fluid imagen_mundi"  src="/assets/image/inglaterra 1966.jpeg">
                    </div>
                    <div class="name_mundial_card d-flex justify-content-between align-items-cente">
                        <p name="nombreMundial" class="float-start nombreMundial">FRANCIA</p>
                        <p name="yearMundial" class="nombreMundial">1938</p>
                    </div>
                    
                </div>

                <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center">
                    <div class="img_mundial_card">
                        <img class="img-fluid imagen_mundi"  src="/assets/image/brasil 1950.webp">
                    </div>
                    <div class="name_mundial_card d-flex justify-content-between align-items-center">
                        <p name="nombreMundial" class="nombreMundial">BRASIL</p>
                        <p name="yearMundial" class="nombreMundial">1950</p>
                    </div> 
                </div>

                <div class="col-12 col-md-3 mundial_card d-flex justify-content-center align-items-center">
                    <div class="img_mundial_card">
                        <img class="img-fluid imagen_mundi"  src="/assets/image/suiza 1954.jpg">
                    </div>
                    <div class="name_mundial_card d-flex justify-content-between align-items-center">
                        <p name="nombreMundial" class="nombreMundial">SUIZA</p>
                        <p name="yearMundial" class="nombreMundial">1954</p>
                    </div> 
                </div>
                
            </div>
        </div>
    </body>
</html>