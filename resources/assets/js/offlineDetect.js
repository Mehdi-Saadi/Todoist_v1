export function offlineDetect() {
    Swal.fire({
        text: 'For saving data, please check your Internet connection!',
        icon: 'warning',
        position: 'top',
        heightAuto: false,
        padding: '0 0 1rem',
        showConfirmButton: false,
        customClass: {
            icon: 'text-gray-500 border mt-3',
        }
    });
}
