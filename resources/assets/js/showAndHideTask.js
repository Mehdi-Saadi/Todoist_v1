export function showCompletedClicked(button) {
    Livewire.emit('showCompleted');
    Livewire.on('showCompletedDone', () => {
        taskSort();
    });
    button.innerHTML = '<i class="fa-regular fa-circle mr-2 text-gray-700"></i>' +
        'Hide completed';
    button.setAttribute('onclick', 'hideCompletedClicked(this)');
}
export function hideCompletedClicked(button) {
    Livewire.emit('hideCompleted')
    Livewire.on('hideCompletedDone', () => {
        taskSort();
    });
    button.innerHTML = '<i class="fa-regular fa-circle-check mr-2 text-gray-700"></i>' +
        'Show completed';
    button.setAttribute('onclick', 'showCompletedClicked(this)');
}
