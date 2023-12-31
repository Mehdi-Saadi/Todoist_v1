import {showCompletedSection} from "./showAndHideTask.js";
import {serializeTaskWithParents} from "./serializeTasks.js";
export function showCheck(item) {
    item.classList.replace('fa-circle', 'fa-circle-check');
}
export function showCircle(item) {
    item.classList.replace('fa-circle-check', 'fa-circle');
}
export function serializeAndSendRequestDone(taskId) {
    const task = document.getElementById(taskId);
    const bubble = document.getElementById('audio');

    sendRequest('put', '/tasks/done', serializeTasks(task), function () {});

    bubble.play();
    toast_alert('', 'task completed');

    // hide the selected task if user is in 'Hide completed' section
    if(showCompletedSection) {
        // will set the 'done circle' checked for selected task and its children
        function setDone(task, firstLoop = true) {
            let children = (firstLoop === true) ? [task] : [].slice.call(task.children);
            for (let i in children) {
                const taskID = children[i].id;
                const doneCircle = children[i].querySelector('div.taskSection > div.navbar > ul.mr-auto > li > button.shadow-none > i');
                doneCircle.classList.replace('fa-circle', 'fa-circle-check');
                doneCircle.setAttribute('onmouseover', 'showCircle(this)');
                doneCircle.setAttribute('onmouseleave', 'showCheck(this)');
                doneCircle.setAttribute("onclick", "serializeAndSendRequestNotDone('" + taskID + "')");
                let nested = children[i].querySelector('.nested-sortable');
                if(nested) {
                    setDone(nested, false);
                }
            }
        }
        setDone(task);
    } else {
        setTimeout(() => task.remove(),500);
    }
}
export function serializeAndSendRequestNotDone(taskId) {
    const task = document.getElementById(taskId);

    sendRequest('put', '/tasks/notDone', serializeTaskWithParents(task), function () {});

    // will set the 'done circle' not checked for selected task and its parents
    function setNotDone(task) {
        const taskID = task.id;
        const doneCircle = task.querySelector('div.taskSection > div.navbar > ul.mr-auto > li > button.shadow-none > i');
        doneCircle.classList.replace('fa-circle-check', 'fa-circle');
        doneCircle.setAttribute('onmouseover', 'showCheck(this)');
        doneCircle.setAttribute('onmouseleave', 'showCircle(this)');
        doneCircle.setAttribute("onclick", "serializeAndSendRequestDone('" + taskID + "')");
        // gets the div.nested-sortable
        let parent = task.parentElement;
        // gets the main parent
        parent = parent.parentElement;

        if(parent.id !== 'grandParentTask') {
            setNotDone(parent);
        }
    }
    setNotDone(task);

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
}
export function serializeAndSendRequestDoneTaskDetail(taskId) {
    serializeAndSendRequestDone(taskId);
    const task = document.getElementById('task-detail-' + taskId);

    function getParentId(task) {
        let parentId = task.id.replace(/^\D+/g, '');
        // gets the div.nested-sortable
        let parent = task.parentElement;
        // gets the main parent
        parent = parent.parentElement;
        if(parent.id === 'grandParentTaskDetail') {
            return parentId;
        } else {
            return getParentId(parent);
        }
    }

    // will set the 'done circle' checked for selected task and its children
    function setDone(task, firstLoop = true, parentId) {
        let children = (firstLoop === true) ? [task] : [].slice.call(task.children);
        for (let i in children) {
            const taskID = children[i].id.replace(/^\D+/g, '');
            const doneCircle = children[i].querySelector('div.taskSection > div.navbar > ul.mr-auto > li > button.shadow-none > i');
            doneCircle.classList.replace('fa-circle', 'fa-circle-check');
            doneCircle.setAttribute('onmouseover', 'showCircle(this)');
            doneCircle.setAttribute('onmouseleave', 'showCheck(this)');
            doneCircle.setAttribute("onclick", "serializeAndSendRequestNotDoneTaskDetail('" + taskID + "', '" + parentId + "')");
            let nested = children[i].querySelector('.nested-sortable');
            if(nested) {
                setDone(nested, false, parentId);
            }
        }
    }
    setDone(task, true, getParentId(task));
}
export function serializeAndSendRequestNotDoneTaskDetail(taskId, parentId) {
    serializeAndSendRequestNotDone(taskId);
    const task = document.getElementById('task-detail-' + taskId);
    // will set the 'done circle' not checked for selected task and its parents
    function setNotDone(task, parentId) {
        const taskId = task.id.replace(/^\D+/g, '');
        const doneCircle = task.querySelector('div.taskSection > div.navbar > ul.mr-auto > li > button.shadow-none > i');
        doneCircle.classList.replace('fa-circle-check', 'fa-circle');
        doneCircle.setAttribute('onmouseover', 'showCheck(this)');
        doneCircle.setAttribute('onmouseleave', 'showCircle(this)');
        doneCircle.setAttribute("onclick", "serializeAndSendRequestDoneTaskDetail('" + taskId + "')");

        // gets the div.nested-sortable
        let parent = task.parentElement;
        // gets the main parent
        parent = parent.parentElement;

        if(task.id !== 'task-detail-' + parentId) {
            setNotDone(parent, parentId);
        }
    }
    setNotDone(task, parentId);
}
