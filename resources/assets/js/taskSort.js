export let sortableItems = [];
export function taskSort() {
    // Nested
    let nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

    // Loop through each nested sortable element
    for (let i = 0; i < nestedSortables.length; i++) {
        sortableItems[i] = new Sortable(nestedSortables[i], {
            group: 'nested',
            handle: '.fa-arrows-up-down-left-right',
            animation: 150,
            fallbackOnBody: true,
            swapThreshold: 0.65,
            onEnd: function () {
                // serialize the tasks ondrop
                const root = document.getElementById('nestedRoot');

                function serialize(sortable) {
                    let serialized = [];
                    let children = [].slice.call(sortable.children);
                    for (let i in children) {
                        let nested = children[i].querySelector('.nested-sortable');
                        serialized.push({
                            id: children[i].id,
                            children: nested ? serialize(nested) : []
                        });
                    }
                    return serialized;
                }

                toast_alert('', 'Order changed');
                // serialize and send tasks with ajax to server
                sendRequest('put', '/tasks/update', serialize(root), function () {});
            }
        });
    }
}
taskSort();
export function taskResort() {
    sortableItems.forEach((sortableItem) => {
        sortableItem.destroy();
    });
    sortableItems = [];
    taskSort();
}
