import {taskResort} from "./taskSort.js";
// this variable helps on 'doneCircleEffect.js' file to use on its functions
// shows if user clicked on 'show completed' button (if it's in 'show completed' section, not done tasks must not disapeard on click
export let showCompletedSection = false;
export function showCompletedClicked(button) {
    Livewire.emitTo('layouts.tasks', 'showCompleted');
    window.addEventListener('showCompletedDone', () => {
        showCompletedSection = true;
        button.innerHTML = '<i class="fa-regular fa-circle mr-2 text-gray-700"></i>' +
            'Hide completed';
        button.setAttribute('onclick', 'hideCompletedClicked(this)');
        taskResort();
    });
}
export function hideCompletedClicked(button) {
    Livewire.emitTo('layouts.tasks', 'hideCompleted');
    window.addEventListener('hideCompletedDone', () => {
        showCompletedSection = false;
        button.innerHTML = '<i class="fa-regular fa-circle-check mr-2 text-gray-700"></i>' +
            'Show completed';
        button.setAttribute('onclick', 'showCompletedClicked(this)');
        taskResort();
    });
}
// Todo delete 'showCompletedDone' and 'hideCompletedDone' eventListeners for preventing executing same code several time...
