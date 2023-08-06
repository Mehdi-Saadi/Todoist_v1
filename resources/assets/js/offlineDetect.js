export function offlineDetect() {
    Swal.fire({
        text: 'Please check your Internet connection!',
        icon: 'warning',
        position: 'top',
        width: 'auto',
        heightAuto: false,
        padding: '0 0 1rem',
        showConfirmButton: false,
        customClass: {
            icon: 'text-gray-500 border mt-3',
        }
    });
}
