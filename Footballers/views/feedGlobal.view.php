<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feed Global - Footballers</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/styles.css" />
    </head>
    
    <!-- HEADER -->
    <header class="main_header" style="position: static;">
        <div class="row align-items-center" id="componentes_header">
            <!-- Columna Logo -->
            <div class="col align-items-center">
                <a href="/main" class="iconos_link me-3" title="Página Principal">
                    <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>

            <!-- Columna Barra de Búsqueda -->
            <div class="col d-flex nav_bar align-items-center justify-content-center" >
                <form class="d-flex w-100" role="search" method="GET" action="">
                    <input class="form-control me-2 barraNav" type="search" name="busqueda" placeholder="Buscar..." aria-label="Search"/>
                    <button class="btn btn-outline-success btn_Nav" type="submit">
                        <img class="iconos_img" src="/assets/iconos/Search.png" alt="Buscar">
                    </button>
                </form>
            </div>
        
            <!-- Columna Iconos de Navegación -->
            <div class="col iconos d-flex justify-content-end">
                <a href="/reporteLike" class="iconos_link me-3" title="Reporte de Likes">
                    <img src="/assets/iconos/favorite.png" class="iconos_img" alt="icono de likes">
                </a>
                <a href="/misPublicaciones" class="iconos_link me-3" title="Mis Publicaciones">
                    <img src="/assets/iconos/notifications.png" class="iconos_img" alt="icono de notificaciones">
                </a>
                <a href="/crearPublicacion" class="iconos_link me-3" title="Crear Nuevo Post">
                    <img src="/assets/iconos/Plus square.png" class="iconos_img" alt="icono de nuevo post">
                </a>
                <a href="/perfilUsuario" class="iconos_link me-3" title="Perfil de Usuario">
                    <img src="/assets/iconos/person (1).png" class="iconos_img" alt="icono de usuario">
                </a>
            </div>
        </div>
    </header>
    
    <body>
        <div class=".container-fluid body_main">
            <!-- Título Principal -->
            <div class="row align-items-center my-4" id="row_mundiales">
                <div class="col palabras_Busqueda text-center">
                    <h1 id="title_page" style="margin-bottom: 10px;font-size: 40px; color: white;">PUBLICACIONES</h1>
                </div>
            </div>

            <!-- 💡 CONTENEDOR DE LA CUADRÍCULA DE PUBLICACIONES -->
            <div class="row justify-content-center gx-4 gy-4">
                
                <?php if (isset($error_db)): ?>
                    <p style="color: red;" class="text-center"><?php echo $error_db; ?></p>
                <?php endif; ?>

                <?php if (empty($publicaciones_globales)): ?>
                    <div class="col-12 text-center mt-5">
                        <p style="color: white; font-size: 1.2em;">No se encontraron publicaciones activas en este momento.</p>
                    </div>
                <?php else: ?>
                    <?php 
                    // Si el feed es muy largo, se podría limitar la cantidad aquí.
                    foreach ($publicaciones_globales as $pub): 
                    ?>
                        
                        <!-- Tarjeta Individual de Publicación (col-4 para 3 por fila, col-12 para móvil) -->
                        <div class="col-12 col-md-4 mundial_card d-flex justify-content-center align-items-center">
                            <div class="publicacion-card w-100">
                                
                                <!-- Imagen/Multimedia -->
                                <div class="card-image-mp">
                                    <a href="/publicacion?id=<?php echo $pub['idPublicacion']; ?>">
                                        <?php 
                                            // NOTA: Simulación de URL de imagen. Usarías un script PHP para servir BLOB o la URL del archivo.
                                            $multimedia_src = '/assets/image/placeholder.jpg'; 
                                            if (!empty($pub['multimedia'])) {
                                                // Lógica para obtener la imagen/video
                                            } else if ($pub['titulo'] === 'URUGUAY') {
                                                $multimedia_src = '/assets/image/uruguay.jpg';
                                            }
                                        ?>
                                        <img class="img-fluid multimedia_MP" src="<?php echo $multimedia_src; ?>" alt="<?php echo htmlspecialchars($pub['titulo']); ?>">
                                    </a>
                                </div>
                                
                                <!-- Pie de la Tarjeta (Nombre del Mundial y Año) -->
                                <div class="name_mundial_card d-flex justify-content-between align-items-center">
                                    <p name="nombrePublicacion" class="nombreMundial"><?php echo htmlspecialchars($pub['titulo']); ?></p>
                                    <p name="usuarioPublicacion" class="nombreMundial"><?php echo htmlspecialchars($pub['nombre_usuario_publi']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </div>
        </div>
    </body>
</html>