function toast_alert(icon, title) {
    const Toast = Swal.mixin({
        toast: true,
        color: '#f8f9fa',
        background: '#282828',
        width: 'auto',
        padding: '.3rem',
        position: 'bottom-start',
        showConfirmButton: false,
        showCloseButton: true,
        timerProgressBar: true,
        timer: 4000,
    });

    Toast.fire({
        icon: icon,
        title: title,
    })
}
