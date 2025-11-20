
document.getElementById('foto').addEventListener('change', function (e) {
    const fileName = document.getElementById('file-name');
    if (this.files && this.files.length > 0) {
        fileName.textContent = this.files[0].name;
    } else {
        fileName.textContent = 'No se ha seleccionado ningún archivo';
    }
});


//Validaciones del forms
document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita el envío inmediato

    let valido = true;
    const nombre = document.getElementById('nombreReg');
    
    // Validar nombre
    const soloLetrasYEspacios = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
    if (!soloLetrasYEspacios.test(nombre.value)) {
        Swal.fire({
            title: "Solo se permiten letras y espacios",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }
     
     // Validar fecha de nacimiento (mayor de 18 años)
    const fechaNacimiento = document.getElementById('fechaNacimiento');
    const hoy = new Date();
    const fechaNac = new Date(fechaNacimiento.value);
    const edad = hoy.getFullYear() - fechaNac.getFullYear();
    const mes = hoy.getMonth() - fechaNac.getMonth();
    
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
        edad--;
    }
    
    if (edad < 18) {
       Swal.fire({
            title: "Solo usuarios de mayor de edad",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

 // Validar género
    const genero = document.getElementById('generoReg');
    if (genero.value === 'Sin seleccionar') {
        Swal.fire({
            title: "Por favor selecciona un genero",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

    // Validar país (solo letras)
    const pais = document.getElementById('paisReg');
    const paisRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    if (!paisRegex.test(pais.value)) {
       Swal.fire({
            title: "El pais solo puede contener letras",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

    // Validar nacionalidad (solo letras)
    const nacionalidad = document.getElementById('nacionalidad');
    if (!paisRegex.test(nacionalidad.value)) {
       
        Swal.fire({
            title: "La nacionalidad solo puede tener letras",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

    // Validar correo electrónico
    const correo = document.getElementById('correo');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(correo.value)) {
        Swal.fire({
            title: "Ingresa un correo valido",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

    //Contraseña
    const contraseña = document.getElementById('contraReg');
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!passwordRegex.test(contraseña.value)) {
        Swal.fire({
            title: "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

     // Validar género
    const rol = document.getElementById('rol');
    if (rol.value === 'Ninguno') {
        Swal.fire({
            title: "Seleccione  un rol",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
        valido = false;
    }

    
   // Validar archivo (si se seleccionó uno)
    const foto = document.getElementById('foto');
    if (foto.files.length > 0) {
        const archivo = foto.files[0];
        const tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        const tamanoMaximo = 5 * 1024 * 1024; // 5MB
        
        if (!tiposPermitidos.includes(archivo.type)) {
            Swal.fire({
            title: "Solo se permiten imágenes JPEG, PNG o GIF",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
            valido = false;
        }
        
        if (archivo.size > tamanoMaximo) {
            Swal.fire({
            title: "La imagen no debe superar los 5mb",
            icon: "error",
           background: "#0d0c0dff" ,
            draggable: true,
            customClass: {
                title: 'mi-titulo',
                confirmButton: 'mi-boton'
            },
            confirmButtonText: 'ok'
        });
            valido = false;
        }
    }

    // Si todo está válido, enviar el formulario
    if (valido) {
        this.submit();
    }

});