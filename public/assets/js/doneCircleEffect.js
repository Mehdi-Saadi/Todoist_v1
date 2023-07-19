function showCheck(item) {
    item.classList.replace('fa-circle', 'fa-circle-check');
}
function showCircle(item) {
    item.classList.replace('fa-circle-check', 'fa-circle');
}

function done(taskId) {
    const task = document.getElementById(taskId);
    const bubble = document.getElementById('audio');
    let count = 0;

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

    let data = serialize(task);

    function computeCountOfTasks(data) {
        data.forEach(function (task) {
            count++;
            if(task.children)
                computeCountOfTasks(task.children);
        });
    }

    computeCountOfTasks(data);

    sendRequest('put', '/tasks/done', data, function () {
        // if response was successfull
        // hide the selected task
        bubble.play();
        if(count === 1) {
            toast_alert('', '1 task completed');
        } else {
            toast_alert('', count + ' tasks completed');
        }
        setTimeout(() => task.remove(),500);

    });
}
