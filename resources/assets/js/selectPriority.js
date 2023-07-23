export function selectPriority(priority) {
    let send_color = document.getElementById('color');
    let priorityDropDownBtn = document.getElementById('priorityDropDown');
    switch (priority) {
        case 1:
            send_color.value = 'text-danger';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1 text-danger\"></i>P1";
            break;
        case 2:
            send_color.value = 'text-warning';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1 text-warning\"></i>P2";
            break;
        case 3:
            send_color.value = 'text-primary';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-solid fa-flag mr-1 text-primary\"></i>P3";
            break;
        case 4:
            send_color.value = '';
            priorityDropDownBtn.innerHTML = "<i class=\"fa-regular fa-flag mr-1\"></i>Priority";
            break;
    }
}
