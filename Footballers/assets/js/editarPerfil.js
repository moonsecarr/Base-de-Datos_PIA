//*Es para la foto de perfil 

document.getElementById('file-upload').addEventListener('change', function (e) {
    const fileName = document.getElementById('file-name'); // el <p> donde muestras el nombre
    const previewImg = document.querySelector('.fotito_perfil_EP'); // tu <img> actual

    if (this.files && this.files.length > 0) {
        // Mostrar nombre del archivo
        fileName.textContent = this.files[0].name;

        // Crear una URL temporal para mostrar la imagen seleccionada
        const reader = new FileReader();
        reader.onload = function (event) {
            previewImg.src = event.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    } else {
        fileName.textContent = 'No se ha seleccionado ningún archivo';
        previewImg.src = '/assets/image/default.jpg'; // opcional: volver a la imagen por defecto
    }
});



//Todo:Es el json de los errores de editar

const form = document.getElementById("editForms");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/editarPerfil", {
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
                title: "¡Has editado correctamente!",
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
               
                window.location.href = "/editarPerfil";
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
               
                window.location.href = "/editarPerfil";
            });


    });
});

 

//!Es para ver que llega de json

/* const form = document.getElementById("editForms");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    fetch("/editarPerfil", { method: "POST", body: new FormData(form) })
  .then(res => {
    console.log("Status:", res.status);
    return res.text(); // primero ver texto crudo
  })
  .then(txt => console.log("Respuesta cruda:", txt))
  .catch(err => console.error("Error:", err));

});  */