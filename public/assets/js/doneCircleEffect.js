function showCheck(item) {
    item.classList.replace('fa-circle', 'fa-circle-check');
}
function showCircle(item) {
    item.classList.replace('fa-circle-check', 'fa-circle');
}

function done(taskId) {
    const task = document.getElementById(taskId);
    const bubble = document.getElementById('audio');

    // this function will serialize the selected task and it's children
    function serialize(sortable, firstLoop = true) {
        let serialized = [];
        let children = (firstLoop === true) ? [sortable] : [].slice.call(sortable.children);
        for (let i in children) {
            let nested = children[i].querySelector('.nested-sortable');
            serialized.push({
                id: children[i].dataset['sortableId'],
                children: nested ? serialize(nested, false) : []
            });
        }
        return serialized;
    }

    sendRequest('put', '/tasks/done', serialize(task), function () {
        // if response was successfull
        // hide the selected task
        bubble.play();
        toast_alert('success', '1 task completed');
        setTimeout(() => task.style.display = 'none',500);
    });
}
