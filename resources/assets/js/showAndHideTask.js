// this variable helps on 'doneCircleEffect.js' file to use on its functions
// shows if user clicked on 'show completed' button (if it's in 'show completed' section, not done tasks must not disapeard on click
export let showCompletedSection = false;
export function showCompletedClicked(button) {
    Livewire.emit('showCompleted');
    Livewire.on('showCompletedDone', () => {
        taskSort();
        showCompletedSection = true;
    });
    button.innerHTML = '<i class="fa-regular fa-circle mr-2 text-gray-700"></i>' +
        'Hide completed';
    button.setAttribute('onclick', 'hideCompletedClicked(this)');
}
export function hideCompletedClicked(button) {
    Livewire.emit('hideCompleted')
    Livewire.on('hideCompletedDone', () => {
        taskSort();
        showCompletedSection = false;
    });
    button.innerHTML = '<i class="fa-regular fa-circle-check mr-2 text-gray-700"></i>' +
        'Show completed';
    button.setAttribute('onclick', 'showCompletedClicked(this)');
}
