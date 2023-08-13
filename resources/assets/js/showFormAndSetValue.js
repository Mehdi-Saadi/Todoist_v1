// Get the modal
let modal = document.getElementById('taskDetails');
// When the user clicks anywhere outside the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
// show the send comment form and set the value of parent id
export function showForm(formId) {
    let form = document.getElementById(formId);
    let nameInput = form.querySelector('input[name="name"]');
    form.style.display='block';
    nameInput.focus();
}
export function hideForm(formId) {
    document.getElementById(formId).style.display='none';
}
export function setValueAndShowForm(button, formId) {
    // get hidden inputs
    let parent_id = document.getElementById('parent_id');
    let is_archive = document.getElementById('is_archive');
    // set value
    parent_id.value = $(button).data('id'); // set the parent id of given name
    is_archive.value = $(button).data('archive'); // set is_archive 1 if user is adding archive
    showForm(formId);
}
export function showBtn(buttonId) {
    document.getElementById(buttonId).style.display='flex';
}
export function hideBtn(buttonId) {
    document.getElementById(buttonId).style.display='none';
}
export function disableAddTaskBtn(nameInput, addTaskBtnId) {
    let submitBtn = document.getElementById(addTaskBtnId);
    if(nameInput.value === '') {
        submitBtn.setAttribute('disabled', 'true');
        submitBtn.setAttribute('type', 'button');
    } else {
        submitBtn.removeAttribute('disabled');
        submitBtn.setAttribute('type', 'submit');
    }
}
