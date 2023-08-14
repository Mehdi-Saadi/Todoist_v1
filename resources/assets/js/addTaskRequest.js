import {taskResort} from "./taskSort.js";

function showSavedTask(parentRoot, task) {
    document.querySelector(parentRoot).innerHTML += '<div class="list-group-item rounded-0 border" id="' + task.id + '">' +
        '<div class="taskSection">' +
        '<div class="row navbar navbar-expand p-0">' +
        '<ul class="navbar-nav mr-auto">' +
        '<li><button class="btn btn-sm shadow-none p-0 ml-4 rounded-circle d-inline-flex justify-content-center done-circle-btn">' +
        '<i class="fa-regular fa-circle fa-lg" style="color: ' + task.color + ' !important;" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="serializeAndSendRequestDone(' + task.id + ')"></i>' +
        '</button></li>' +
        '<li class="dropdown no-arrow">' +
        '<button type="button" class="dropdown-toggle btn btn-sm pt-0 ml-2" id="task-' + task.id + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' + task.name + '</button>' +
        '<div class="dropdown-menu dropdown-menu shadow animated--grow-in" aria-labelledby="task-' + task.id + '">' +
        '<button type="button" class="dropdown-item btn btn-sm" onclick="deleteTask(' + task.id + ', \'' + task.name + '\')">' +
        '<i class="fa-regular fa-trash-can mr-2 text-danger"></i>' +
        'Delete task' +
        '</button>' +
        '</div>' +
        '</li>' +
        '</ul>' +
        '<ul class="navbar-nav ml-auto">' +
        '<li><i class="fa-solid fa-arrows-up-down-left-right text-gray-500 mr-3 p-1"></i></li>' +
        '</ul>' +
        '</div>' +
        '<div class="row">' +
        '<small class="ml-5 text-gray-500">' + task.description + '</small>' +
        '</div>' +
        '</div>' +
        '<div class="list-group nested-sortable mt-2" style="min-height: 20px">' +
        '</div>' +
        '</div>';
}

export function submitTask(taskFormId, parentId, archiveId, colorId, priorityDropDownId) {
    document.querySelector('#'+taskFormId).addEventListener('submit', function (event) {
        event.preventDefault();
        let target = event.target;
        if (target.querySelector('#'+archiveId).value === '' || target.querySelector('#'+parentId).value === '' || target.querySelector('#'+colorId).value === '' || target.querySelector('input[name="name"]').value === '') {
            return
        }
        let data = {
            archive_id: target.querySelector('#'+archiveId).value,
            parent_id: target.querySelector('#'+parentId).value,
            color: target.querySelector('#'+colorId).value,
            name: target.querySelector('input[name="name"]').value,
            description: target.querySelector('input[name="description"]').value,
        };

        sendRequest('post', "/task/create", data, function (task) {
            if(task.description === null) task.description = '';

            if(data.parent_id !== '0') {
                // show in modal page
                showSavedTask('#task-detail-'+data.parent_id+'>div.nested-sortable', task);
                // add new task in its parent section
                showSavedTask('[id="'+data.parent_id+'"]>div.nested-sortable', task);

            } else {
                // show in main page
                showSavedTask('#nestedRoot', task);
            }

            // sort all tasks again
            taskResort();
            toast_alert('', 'Task created');
        });

        target.querySelector('#'+parentId).value = 0;
        selectPriority(4, colorId, priorityDropDownId);
        target.querySelector('input[name="name"]').value = '';
        target.querySelector('input[name="description"]').value = '';
        target.querySelector('button[type="submit"]').setAttribute('disabled', 'true');
        target.querySelector('button[type="submit"]').setAttribute('type', 'button');
    });
}
