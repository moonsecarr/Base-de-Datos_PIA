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
                <a href="/Pantallas_PIA/ReporteLikes.html" class="iconos_link me-3" title="Reporte de Likes">
                    <img src="/assets/iconos/Folder plus.png" class="float-end iconos_img" alt="icono de likes">
                </a>

                <a href="/Pantallas_PIA/ReporteLikes.html" class="iconos_link me-3" title="Reporte de Likes">
                    <img src="/assets/iconos/favorite.png" class="float-end iconos_img" alt="icono de likes">
                </a>

                <a href="/Pantallas_PIA/MisPublicaciones.html" class="iconos_link me-3" title="Mis Publicaciones">
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
                <h1 class="text-center" id="title_page" style="margin-bottom: 40px;font-size: 40px;">CATEGORÍAS</h1>
                <div class="col d-flex flex-column contenedorNewCat">
                    <div class="col d-flex">
                        <label style="width: 40%;" name="name_categoria">NUEVA CATEGORÍA:</label>
                        <input type="text" class="form-control input_newCat" name="input_newCat" placeholder="" style="margin-right: 20px;">
                        <input class="btn btn-primary" type="submit" value="Crear" id="btn_CrearCat" name="btn_CrearCat" style="background-color: #D60004;">
                    </div>
                    
                    
                    
                </div>

                <div class="row d-flex flex-column align-items-center contenedorCat">
                    <div class="col d-flex containerCAT" style="color:aliceblue">
                        <p style="width: 100%;" name="name_categoria">Nombre Categoria</p>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault" >  
                        </div>
                        
                    </div>

                    <div class="col d-flex containerCAT" style="color:aliceblue">
                        <p style="width: 100%;" name="name_categoria">Nombre Categoria</p>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">  
                        </div>
                        
                    </div>
                    <div class="col d-flex containerCAT" style="color:aliceblue">
                        <p style="width: 100%;" name="name_categoria">Nombre Categoria</p>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">  
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>