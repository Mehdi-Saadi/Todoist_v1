document.querySelector('#labelForm').addEventListener('submit', function (event) {
    event.preventDefault();
    let target = event.target;
    if (target.querySelector('input[name="name"]').value === '' || target.querySelector('#color').value === '') {
        return
    }
    let data = {
        color: target.querySelector('#color').value,
        name: target.querySelector('input[name="name"]').value
    };

    sendRequest('post', "/label/create", data, function (label) {
        document.querySelector('#labels').innerHTML += '<div class="list-group-item" id="' + label.id + '">' +
        '<i class="fa-solid fa-tag mr-3" style="color:' + label.color + ' !important;"></i>' + label.name +
        '</div>';

        // sort all labels again
        labelResort();
        toast_alert('', 'Label created');
    });

    selectLabel('#808080', 'Charcoal');
    target.querySelector('input[name="name"]').value = '';
    target.querySelector('button[type="submit"]').setAttribute('disabled', 'true');
    target.querySelector('button[type="submit"]').setAttribute('type', 'button');
});
