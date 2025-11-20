<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CrearMundial</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="/assets/css/styles.css">
    </head>

    <header class="main_header" style="position: static;">
        <div class="row" id="componentes_header">
            <div class="col align-items-center">
                <a href="/main" class="iconos_link me-3" title="Página Principal">
                    <img src="/assets/image/footballers.png" class="float-start imagen_logo" alt="nameapp">
                </a>  
            </div>
        
            <div class="col iconos d-flex justify-content-end align-items-center">
                

                <a href="/misPublicaciones" class="iconos_link me-3" title="Notificaciones">
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
        <div class=".container-fluid">
            <div class="row align-items-center  vh-100" id="componentes_body_index">
                <div class="col-4 position-relative" id="left-panel">
                    <div class="half-circle">
                         <div class="circle-container"></div>
                        <div class="circle-container2"></div>
                    </div>
                    <div class="logo-text text-white">
                        footballers
                    </div>
                </div> 


            <div class="col" id="form_IS" style="margin: 60px; margin-top: 0px;">
                <h1 class="text-center" id="title_page" style="margin-bottom: 10px;">CREAR MUNDIAL</h1>
                <div class="mb-1" id="forms"> 
                    <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Título:</label>
                    <input type="text" class="form-control" id="input_Usuario_IS" name="input_TituloMundial" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 93%;">
                </div>

                <div class="mb-1" id="forms">
                    <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Descripción:</label>
                    <textarea 
                        id="input_DesMundial"
                        name="input_DesMundial"
                        class="form-control"
                        placeholder="Escribe tu descripción aquí..."
                        rows="1"
                        oninput="adjustHeight(this)" 
                        style="
                            background-color: #6100E9; border: none; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 93%; 
                            resize: none;
                            overflow-y: hidden; 
                            min-height: 40px; 
                            max-height: 160px;">
                    </textarea>
                </div>

                <div class="mb-1" id="forms">
                    <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Año:</label>
                    <input type="number" class="form-control" id="input_Usuario_IS" name="input_YearMundial" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 25%;">
                </div>

                <div class="mb-1" id="forms" style="display: flex; margin-right: 5px;">
                    <div class="col-5" style="margin-right: 62px;">
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Campeón:</label>
                        <input type="text" class="form-control" id="input_Usuario_IS" name="input_Campeon" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 100%;">
                    </div>

                    <div class="col-5">
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Subcampeón:</label>
                        <input type="text" class="form-control" id="input_Usuario_IS" name="input_Subcampeon" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 100%;">
                    </div>
                    
                </div>

                <div class="mb-1" id="forms" style="display: flex; margin-right: 5px;">
                    <div class="col-5" style="margin-right: 62px;">
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Mayor Goleador:</label>
                        <input type="text" class="form-control" id="input_Usuario_IS" name="input_MayorGoleador" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 100%;">
                    </div>

                    <div class="col-5">
                        <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">MVP:</label>
                        <input type="text" class="form-control" id="input_Usuario_IS" name="input_MVP" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 15px; font-size: 18px; margin: 5px; border-radius: 25px; width: 100%;">
                    </div>
                    
                </div>

                <div id="forms" class="mb-1" style="width: 700px;" >
                    
                    <label for="input_Usuario_IS" class="form-label" id="label_text" style="font-size: larger;">Cargar multimedia:</label>
                    <input type="file" class="form-control" id="input_Usuario_IS" name="CargarMultimedia" placeholder="" style="background-color: #6100E9; border: none; height: 60px; color: white; padding: 20px; padding-left: 30px; font-size: 15px; margin: 10px; border-radius: 25px; width: 530px;">
                    
                    <input class="btn btn-primary" type="submit" value="Publicar" id="btn_IS" name="btn_PublicarMundial" style="background-color: #D60004; margin: 25px; margin-left: 280px;">

                </div> 

            </div>
        </div>
    </body>
    <script>
        function adjustHeight(el) {
            const maxHeight = 160; // Altura máxima en píxeles (aprox. 6-7 líneas)
            
            // 1. Restablecer la altura para calcular el scrollHeight correctamente
            el.style.height = 'auto'; 
            
            // 2. Determinar si se necesita scroll
            if (el.scrollHeight <= maxHeight) {
                // Si no ha alcanzado el máximo, expandir para mostrar todo el contenido
                el.style.height = el.scrollHeight + 'px';
                el.style.overflowY = 'hidden'; // Asegurar que el scroll esté oculto
            } else {
                // Si se supera el máximo (6 renglones), forzar la altura máxima
                el.style.height = maxHeight + 'px';
                el.style.overflowY = 'auto'; // 💡 Aparece la barra de desplazamiento
            }
        }
    </script>
</html>