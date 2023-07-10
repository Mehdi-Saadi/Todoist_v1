function showCheck(item) {
    item.classList.remove('fa-circle');
    item.classList.add('fa-circle-check');
}
function showCircle(item) {
    item.classList.remove('fa-circle-check');
    item.classList.add('fa-circle');
}

function done(taskId) {
    const task = document.getElementById(taskId);
    const bubble = document.getElementById('audio');

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
        setTimeout(() => task.style.display = 'none',500);
    })
}