export function searchTask(searchField) {
    let filter, taskList, tasks, txtValue;
    filter = searchField.value.toUpperCase();
    taskList = document.getElementById("nestedRoot");
    tasks = taskList.querySelectorAll(":scope > div");
    for (let i = 0; i < tasks.length; i++) {
        txtValue = tasks[i].querySelector('div.taskSection > div.navbar > ul.mr-auto > li:last-child > button').innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tasks[i].style.display = "";
        } else {
            tasks[i].style.display = "none";
        }
    }
}
