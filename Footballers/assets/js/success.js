
setTimeout(function () {
    // Ocultar el spinner
    document.querySelector('.loading-container').style.display = 'none';

    // Mostrar SweetAlert personalizado
    Swal.fire({
        title: '¡Registro Exitoso!',
        text: 'Tu cuenta ha sido creada correctamente.',
        icon: 'success',
        iconColor: '#764ba2',
        confirmButtonText: 'Continuar',
        confirmButtonColor: '#667eea',
        background: '#f8f9fa',
        color: '#333',
        customClass: {
            title: 'swal-title-custom',
            content: 'swal-text-custom',
            confirmButton: 'swal-button-custom'
        }
    });

}, 2000); // 2000 milisegundos = 2 segundos