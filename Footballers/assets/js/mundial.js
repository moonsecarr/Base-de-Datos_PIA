
//*Es para la foto de perfil 

document.getElementById('input_Usuario_IS').addEventListener('change', function (e) {
    const fileName = document.getElementById('file');
    if (this.files && this.files.length > 0) {
        fileName.textContent = this.files[0].name;
    } else {
        fileName.textContent = 'No se ha seleccionado ningún archivo';
    }
});



//Todo:Es el json de los errores de registro-process

/* const form = document.getElementById("forms_mundial");
 
form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/mundial-process", {
        method: "POST",
        body: new FormData(form)
    })
    .then(res => res.json())
    .then(data => {
        console.log("Respuesta del servidor:", data); // depuración
        if (data.status === "error") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: data.message,
                background: "#0d0c0dff",
                draggable: true,
                customClass: {
                    title: 'mi-titulo',
                    confirmButton: 'mi-boton'
                },
                confirmButtonText: 'ok',
                showConfirmButton: true,
                allowOutsideClick: false
            });

        } else {

            Swal.fire({
                icon: "success",
                title: "¡Mundial registrado!",
                text: data.message,
                background: "#0d0c0dff",
                draggable: true,
                customClass: {
                    title: 'mi-titulo',
                    confirmButton: 'mi-boton'
                },
                confirmButtonText: 'ok',
                timer: 3000,
                timerProgressBar: true,
                allowOutsideClick: false,
                showConfirmButton: true
            }).then(() => {
               
                window.location.href = "/administrador/main";
            });

        }
    })
    .catch(err => {
        console.error(err);
        Swal.fire({
            icon: "error",
            title: "Error inesperado",
            text: "No se pudo conectar con el servidor",
            background: "#0d0c0dff",
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok',
            showConfirmButton: true,
            allowOutsideClick: false
        }).then(() => {
               
                window.location.href = "/crearMundial";
        });


    });
});
 */


//!Es para ver que llega de json
const form = document.getElementById("forms_mundial");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/mundial-process", { method: "POST", body: new FormData(form) })
  .then(res => {
    console.log("Status:", res.status);
    return res.text(); // primero ver texto crudo
  })
  .then(txt => console.log("Respuesta cruda:", txt))
  .catch(err => console.error("Error:", err));

});    
