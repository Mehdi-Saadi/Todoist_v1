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
        document.getElementById('nestedRoot').innerHTML += '<div data-sortable-id="' + task.id + '" class="list-group-item rounded-0 border-top border-bottom" id="' + task.id + '">' +
            '<div class="taskSection">' +
            '<div class="row navbar navbar-expand p-0">' +
            '<ul class="navbar-nav mr-auto">' +
            '<li><button class="btn btn-sm p-0 ml-4 rounded-circle d-inline-flex justify-content-center" style="width: 15px; height: 15px;">' +
            '<i class="fa-regular fa-circle ' + task.color + '" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="done(' + task.id + ')"></i>' +
            '</button></li>' +
            '<li><button type="button" class="btn btn-sm pt-0 ml-2" onclick="sendRequest(\'post\', \'/task\', ' + task.id + ', function () {showForm(\'taskDetails\');})">' + task.name + '</button></li>' +
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
