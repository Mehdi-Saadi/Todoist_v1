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
    document.getElementById(formId).style.display='block';
}
export function scrollToBottom() {
    window.scrollTo(0, document.body.scrollHeight);
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
    scrollToBottom();
}
export function showBtn(buttonId) {
    document.getElementById(buttonId).style.display='flex';
}
export function hideBtn(buttonId) {
    document.getElementById(buttonId).style.display='none';
}
