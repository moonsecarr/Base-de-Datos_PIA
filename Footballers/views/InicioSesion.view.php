<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio de Sesion</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/styles.css" />
    </head>
    <header class="main_header" style="position: static;">
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

            <form class="col" id="form_IS" action="/Pantallas_PIA/main.html">
                <h1 class="text-center" id="title_page">INICIO DE SESIÓN</h1>
                <div class="mb-3" id="forms">
                    <label for="input_Usuario_IS" class="form-label" id="label_text">Usuario:</label>
                    <input type="email" class="form-control" id="input_Usuario_IS" placeholder="" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 25px; font-size: 25px; margin: 10px; border-radius: 25px;">
                </div>
                <div id="forms" class="align-items-center">
                    <label for="input_Contra" class="form-label" id="label_text">Contraseña:</label>
                    <input type="password" id="input_Contra" class="form-control" aria-describedby="passwordHelpBlock" style="background-color: #6100E9; border: none; height: 40px; color: white; padding: 25px; font-size: 25px; margin: 10px; border-radius: 25px;">
                    <div id="passwordHelpBlock" class="form-text" style="color: rgb(67, 67, 67); margin-top: 15px;">
                        Tú contraseña debe contener mínimo 8 caracteres, sin carácteres
                        especiales ni emojis. 
                    </div>
                    
                    <input class="btn btn-primary" type="submit" value="Ingresar" id="btn_IS" style="background-color: #D60004; margin: 25px; margin-left: 280px;">
                   
                    <br>
                    <a href="/Pantallas_PIA/registro.html" style="margin-top: 15px;">
                        Aún no tengo cuenta
                    </a>
                </div> 
            </form>
        </div>
        </div>
    </body>
</html>