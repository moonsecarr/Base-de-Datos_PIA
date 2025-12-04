
document.querySelectorAll('.form-check-input').forEach(function(input) {
    input.addEventListener('change', function() {
        let idCategoria = this.dataset.id;
        let estado = this.checked ? 1 : 0;

        fetch('/actualizar_estado', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'idCategoria=' + idCategoria + '&estado=' + estado
        })
        .then(res => res.text())
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
                title: "¡Categoria actualizada!",
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
               
                window.location.href = "/crearCategorias";
            });

        }
    }).catch(err => {
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
               
                window.location.href = "/crearCategorias";
        });


    });
});

//Todo:Es el json de los errores de editar
 const form = document.getElementById("form_Categoria");
 
form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/categoria-process", {
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
                title: "¡Categoria registrada!",
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
               
                window.location.href = "/crearCategorias";
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
               
                window.location.href = "/crearCategorias";
        });


    });
});

//!Es para ver que llega de json  , variables

/* const form = document.getElementById("form_Categoria");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/categoria-process", {
    method: "POST",
    body: new FormData(form)
})
.then(res => {
    console.log("Status:", res.status);
    return res.text(); // primero mira el texto crudo
})
.then(text => {
    console.log("Respuesta cruda:", text);
    try {
        const data = JSON.parse(text);
        console.log("JSON parseado:", data);
        // aquí tu lógica con Swal...
    } catch (err) {
        console.error("No es JSON válido:", err);
    }
})
.catch(err => {
    console.error("Error de conexión:", err);
});

});
 */
//!Es para ver que llega de json
/* 
const form = document.getElementById("form_Categoria");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/categoria-process", { method: "POST", body: new FormData(form) })
  .then(res => {
    console.log("Status:", res.status);
    return res.text(); // primero ver texto crudo
  })
  .then(txt => console.log("Respuesta cruda:", txt))
  .catch(err => console.error("Error:", err));

});   
*/