export function showCheck(item) {
    item.classList.replace('fa-circle', 'fa-circle-check');
}
export function showCircle(item) {
    item.classList.replace('fa-circle-check', 'fa-circle');
}
export function serializeAndSendRequestDone(taskId) {
    const task = document.getElementById(taskId);
    const bubble = document.getElementById('audio');

    // hide the selected task
    bubble.play();
    toast_alert('', 'task completed');
    setTimeout(() => task.style.display = 'none',500);

    sendRequest('put', '/tasks/done', serializeTasks(task), function () {
        console.log('done')
    });
}
// Todo this section is not completed
export function serializeAndSendRequestNotDone(taskId, isDone) {
    // isDone must be bool
    if(isDone === 1 || isDone === 0) {
        const task = document.getElementById(taskId);
        const bubble = document.getElementById('audio');
        // let count = 0;
        // let data = serializeTasks(task);

        // function computeCountOfTasks(data) {
        //     data.forEach(function (task) {
        //         count++;
        //         if(task.children)
        //             computeCountOfTasks(task.children);
        //     });
        // }
        //
        // computeCountOfTasks(data);

        sendRequest('put', '/tasks/notDone', serializeTasks(task), function () {
            console.log('done')
        });
    }
}
