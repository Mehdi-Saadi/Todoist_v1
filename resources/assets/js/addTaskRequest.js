document.querySelector('#taskForm').addEventListener('submit', function (event) {
    event.preventDefault();
    let target = event.target;
    let data = {
        parent_id: target.querySelector('#parent_id').value,
        is_archive: target.querySelector('#is_archive').value,
        color: target.querySelector('#color').value,
        name: target.querySelector('input[name="name"]').value,
        description: target.querySelector('input[name="description"]').value,
    };

    sendRequest('post', "/task/create", data, function (task) {
        if(task.description === null) task.description = '';
        document.getElementById('nestedRoot').innerHTML += '<div data-sortable-id="' + task.id + '" class="list-group-item rounded-0 border" id="' + task.id + '">' +
            '<div class="taskSection">' +
            '<div class="row navbar navbar-expand p-0">' +
            '<ul class="navbar-nav mr-auto">' +
            '<li><button class="btn btn-sm shadow-none p-0 ml-4 rounded-circle d-inline-flex justify-content-center done-circle-btn">' +
            '<i class="fa-regular fa-circle fa-lg ' + task.color + '" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="serializeAndSendRequestDone(' + task.id + ')"></i>' +
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
        // sort all tasks again
        taskSort();

        toast_alert('', 'Task created');
    });

    target.querySelector('#parent_id').value = 0;
    target.querySelector('#is_archive').value = 0;
    selectPriority(4);
    target.querySelector('input[name="name"]').value = '';
    target.querySelector('input[name="description"]').value = '';
});
