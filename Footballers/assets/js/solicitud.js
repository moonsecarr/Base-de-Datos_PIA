
//Todo:Es el json de los errores de registro-process

const forms = document.querySelectorAll(".formAceptar");
forms.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/admin/aprobarPublicacion", {
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
                title: "¡Publicacion aprobada!",
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
               
                window.location.href = "/solicitudesPublicacion";
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
               
                window.location.href = "/solicitudesPublicacion";
        });

    });
});



//!Es para ver que llega de json
/* const form = document.getElementById("formAceptar");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/admin/aprobarPublicacion", { method: "POST", body: new FormData(form) })
  .then(res => {
    console.log("Status:", res.status);
    return res.text(); // primero ver texto crudo
  })
  .then(txt => console.log("Respuesta cruda:", txt))
  .catch(err => console.error("Error:", err));

}); 
  */