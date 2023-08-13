export function deleteTask(taskId, taskName) {
    Swal.fire({
        title: "Are you sure you want to delete '" + taskName + "'?",
        icon: 'warning',
        position: 'top',
        width: 'auto',
        heightAuto: false,
        padding: '0 0 1rem',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: 'Delete',
        customClass: {
            actions: 'flex-row-reverse',
            confirmButton: 'btn btn-sm btn-danger ml-3',
            cancelButton: 'btn btn-sm border',
            icon: 'text-gray-500 border mt-3',
            title: 'h6',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const task = document.getElementById(taskId);
            task.remove();
            toast_alert('', 'task removed');
            sendRequest('delete', '/task/destroy', serializeTasks(task), function () {});
        }
    })
}
