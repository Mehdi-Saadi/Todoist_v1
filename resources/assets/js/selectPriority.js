export function selectPriority(priority, colorFieldId, priorityDropDownId) {
    let send_color = document.getElementById(colorFieldId);
    let priorityDropDownBtn = document.getElementById(priorityDropDownId);
    switch (priority) {
        case 1:
            send_color.value = '#db4035';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1\" style='color: #db4035 !important;'></i>P1";
            break;
        case 2:
            send_color.value = '#fad000';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1\" style='color: #fad000 !important;'></i>P2";
            break;
        case 3:
            send_color.value = '#4073ff';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1\" style='color: #4073ff !important;'></i>P3";
            break;
        case 4:
            send_color.value = '#808080';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-regular fa-flag mr-1\" style='color: #808080 !important;'></i>Priority";
            break;
    }
}
export function selectPriorityTaskDetails(priority, mainTaskId) {
    let priorityDropDownBtn = document.getElementById('priorityDropDownDetail');
    let mainTask = document.getElementById(mainTaskId);
    let mainCircle = mainTask.querySelector('div.taskSection > div.navbar > ul.mr-auto > li > button > i');
    let taskDetail = document.getElementById('task-detail-' + mainTaskId);
    let taskDetailCircle = taskDetail.querySelector('div.taskSection > div.navbar > ul.mr-auto > li > button > i');
    let data;
    switch (priority) {
        case 1:
            data = {
                id: mainTaskId,
                color: '#db4035'
            };
            sendRequest('put', '/task/color/update', data, function () {});
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1\" style='color: #db4035 !important;'></i>P1";
            mainCircle.style.color = '#db4035';
            taskDetailCircle.style.color = '#db4035';
            break;
        case 2:
            data = {
                id: mainTaskId,
                color: '#fad000'
            };
            sendRequest('put', '/task/color/update', data, function () {});
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1\" style='color: #fad000 !important;'></i>P2";
            mainCircle.style.color = '#fad000';
            taskDetailCircle.style.color = '#fad000';
            break;
        case 3:
            data = {
                id: mainTaskId,
                color: '#4073ff'
            };
            sendRequest('put', '/task/color/update', data, function () {});
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1\" style='color: #4073ff !important;'></i>P3";
            mainCircle.style.color = '#4073ff';
            taskDetailCircle.style.color = '#4073ff';
            break;
        case 4:
            data = {
                id: mainTaskId,
                color: '#808080'
            };
            sendRequest('put', '/task/color/update', data, function () {});
            priorityDropDownBtn.innerHTML = "<i class=\"fa-regular fa-flag mr-1\" style='color: #808080 !important;'></i>P4";
            mainCircle.style.color = '#808080';
            taskDetailCircle.style.color = '#808080';
            break;
    }
}
