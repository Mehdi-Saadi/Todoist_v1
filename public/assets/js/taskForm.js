// Get the modal
let modal = document.getElementById('taskForm');

// When the user clicks anywhere outside the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

// show the send comment form and set the value of parent id
function ShowFormAndSetValue(button) {
    document.getElementById('taskForm').style.display='block';
    // get hidden inputs
    let parent_id = document.getElementById('parent_id');
    let is_archive = document.getElementById('is_archive');
    // set value
    parent_id.value = $(button).data('id'); // set the parent id of given name
    is_archive.value = $(button).data('archive'); // set is_archive 1 if user is adding archive
}
