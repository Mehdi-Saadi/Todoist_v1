// Nested
let nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

// Loop through each nested sortable element
for (let i = 0; i < nestedSortables.length; i++) {
    new Sortable(nestedSortables[i], {
        group: 'nested',
        animation: 150,
        fallbackOnBody: true,
        swapThreshold: 0.65
    });
}

// serialize the tasks ondrop
const nestedQuery = '.nested-sortable';
const identifier = 'sortableId';
const root = document.getElementById('nestedRoot');
function serialize(sortable) {
    let serialized = [];
    let children = [].slice.call(sortable.children);
    for (let i in children) {
        let nested = children[i].querySelector(nestedQuery);
        serialized.push({
            id: children[i].dataset[identifier],
            children: nested ? serialize(nested) : []
        });
    }
    return serialized;
}

// send serialized tasks with ajax to server
function sendRequest(serialized) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    });

    $.ajax({
        type: 'put',
        url: '/tasks/update',
        data: JSON.stringify(serialized),
        success: function () {
            console.log('serialized');
        }
    });
}
