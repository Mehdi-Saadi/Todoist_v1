export function selectLabel(code, name) {
    const colorInput = document.getElementById('color');
    const colorDropDownBtn = document.getElementById('labelDropDown');
    colorInput.value = code;
    colorDropDownBtn.innerHTML = '<span class="d-inline"><i class="fa-solid fa-circle mr-2" style="color: ' + code + ' !important;"></i>' + name + '</span>';
}
