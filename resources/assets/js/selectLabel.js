export function selectColor(code, name) {
    const colorInput = document.getElementById('color');
    const colorDropDownBtn = document.getElementById('colorDropDown');
    colorInput.value = code;
    colorDropDownBtn.innerHTML = '<span class="d-inline"><i class="fa-solid fa-circle mr-2" style="color: ' + code + ' !important;"></i>' + name + '</span>';
}
export function selectLabel(code, name, labelFieldId, labelDropDownId) {
    // check if close btn exists and remove it
    const closeBtn = document.getElementById('deleteLabelBtn');
    if(closeBtn) {closeBtn.remove();}
    const labelField = document.getElementById(labelFieldId);
    const labelDropDownBtn = document.getElementById(labelDropDownId);
    labelField.value = name;
    labelDropDownBtn.innerHTML = '<i class="fa-solid fa-tag mr-1" style="color: ' + code + ' !important;"></i>' + name;
    labelDropDownBtn.classList.add('border-right-0');
    $('<button class="btn btn-sm border border-left-0" id="deleteLabelBtn" onclick="deleteLabel(\'' + labelFieldId + '\', \'' + labelDropDownId + '\')"><i class="fa-solid fa-close"></i></button>').insertAfter(labelDropDownBtn);
}
export function deleteLabel(labelFieldId, labelDropDownId) {
    const labelField = document.getElementById(labelFieldId);
    const labelDropDownBtn = document.getElementById(labelDropDownId);
    const closeBtn = document.getElementById('deleteLabelBtn');
    labelDropDownBtn.classList.remove('border-right-0');
    labelField.value = '';
    labelDropDownBtn.innerHTML = '<i class="fa-solid fa-tags mr-1"></i>Labels';
    if(closeBtn) {closeBtn.remove();}
}
