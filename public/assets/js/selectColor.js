function selectColor(color) {
    let send_color = document.getElementById('color');
    let colorDropDownBtn = document.getElementById('labelDropDown');
    switch (color) {
        case 1:
            send_color.value = 'b8258f';
            colorDropDownBtn.innerHTML = "<span class=\"d-inline\"><i class=\"fa-solid fa-circle mr-2\" style=\"color: #b8258f\"></i>Berry Red</span>";
            break;
    }
}
