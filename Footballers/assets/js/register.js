document.getElementById('input_foto').addEventListener('change', function (e) {
    const fileName = document.getElementById('file-name');
    if (this.files && this.files.length > 0) {
        fileName.textContent = this.files[0].name;
    } else {
        fileName.textContent = 'No se ha seleccionado ningún archivo';
    }
});

// Validaciones del formulario
document.getElementById('form_IS').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita el envío inmediato

    let valido = true;
    
    // Validar nombre completo
    const nombre = document.getElementById('input_NomCom');
    const soloLetrasYEspacios = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
    if (!nombre.value.trim()) {
        mostrarError("Por favor ingresa tu nombre completo");
        return false;
    }
    if (!soloLetrasYEspacios.test(nombre.value)) {
        mostrarError("Solo se permiten letras y espacios en el nombre");
        return false;
    }
     
    // Validar nombre de usuario
    const nombreUsuario = document.getElementById('input_NomUsu');
    if (!nombreUsuario.value.trim()) {
        mostrarError("Por favor ingresa un nombre de usuario");
        return false;
    }

    // Validar fecha de nacimiento (mayor de 18 años)
    const fechaNacimiento = document.getElementById('fechaNacimiento');
    if (!fechaNacimiento.value) {
        mostrarError("Por favor ingresa tu fecha de nacimiento");
        return false;
    }
    
    const hoy = new Date();
    const fechaNac = new Date(fechaNacimiento.value);
    let edad = hoy.getFullYear() - fechaNac.getFullYear();
    const mes = hoy.getMonth() - fechaNac.getMonth();
    
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
        edad--;
    }
    
    if (edad < 18) {
        mostrarError("Debes ser mayor de 18 años para registrarte");
        return false;
    }

    // Validar género
    const genero = document.getElementById('genero');
    if (genero.value === 'Sin seleccionar') {
        mostrarError("Por favor selecciona un género");
        return false;
    }

    // Validar país (solo letras)
    const pais = document.getElementById('pais');
    const paisRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    if (!pais.value.trim()) {
        mostrarError("Por favor ingresa tu país");
        return false;
    }
    if (!paisRegex.test(pais.value)) {
        mostrarError("El país solo puede contener letras");
        return false;
    }

    // Validar nacionalidad
    const nacionalidad = document.getElementById('nacionalidad');
    if (!nacionalidad.value) {
        mostrarError("Por favor selecciona tu nacionalidad");
        return false;
    }

    // Validar correo electrónico
    const correo = document.getElementById('correo');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!correo.value.trim()) {
        mostrarError("Por favor ingresa tu correo electrónico");
        return false;
    }
    if (!emailRegex.test(correo.value)) {
        mostrarError("Ingresa un correo electrónico válido");
        return false;
    }

    // Validar contraseña
    const contraseña = document.getElementById('contraReg');
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!contraseña.value) {
        mostrarError("Por favor ingresa una contraseña");
        return false;
    }
    if (!passwordRegex.test(contraseña.value)) {
        mostrarError("La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número");
        return false;
    }

    // Validar confirmación de contraseña
    const confirmarContra = document.getElementById('confirmarContra');
    if (contraseña.value !== confirmarContra.value) {
        mostrarError("Las contraseñas no coinciden");
        return false;
    }

    // Validar términos y condiciones
    const terminos = document.getElementById('terminos');
    if (!terminos.checked) {
        mostrarError("Debes aceptar los términos y condiciones");
        return false;
    }

    // Validar archivo (si se seleccionó uno)
    const foto = document.getElementById('input_foto');
    if (foto.files.length > 0) {
        const archivo = foto.files[0];
        const tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        const tamanoMaximo = 5 * 1024 * 1024; // 5MB
        
        if (!tiposPermitidos.includes(archivo.type)) {
            mostrarError("Solo se permiten imágenes JPEG, PNG o GIF");
            return false;
        }
        
        if (archivo.size > tamanoMaximo) {
            mostrarError("La imagen no debe superar los 5MB");
            return false;
        }
    }

    // Si todo está válido, enviar el formulario
    mostrarExito("¡Registro exitoso! Redirigiendo...");
    setTimeout(() => {
        this.submit();
    }, 2000);
});

// Función para mostrar errores
function mostrarError(mensaje) {
    Swal.fire({
        title: mensaje,
        icon: "error",
        background: "#0d0c0dff",
        draggable: true,
        customClass: {
            title: 'mi-titulo',
            confirmButton: 'mi-boton'
        },
        confirmButtonText: 'Entendido'
    });
}

// Función para mostrar éxito
function mostrarExito(mensaje) {
    Swal.fire({
        title: mensaje,
        icon: "success",
        background: "#0d0c0dff",
        draggable: true,
        customClass: {
            title: 'mi-titulo',
            confirmButton: 'mi-boton'
        },
        confirmButtonText: 'OK'
    });
}