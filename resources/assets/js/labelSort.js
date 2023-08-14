export let labelSortableItems = '';
export function labelSort() {
    const labelField = document.getElementById('labels');

    labelSortableItems = new Sortable(labelField, {
        animation: 150,
        onEnd: function () {
            const labels = [].slice.call(labelField.children);
            // serialize the labels ondrop
            function serialize(sortable) {
                let serialized = [];
                for (let i in sortable) {
                    serialized.push({
                        id: sortable[i].id,
                    });
                }
                return serialized;
            }
            toast_alert('', 'Order changed');
            // serialize and send labels with ajax to server
            sendRequest('put', '/labels/update', serialize(labels), function () {});
        }
    });
}
labelSort();
export function labelResort() {
    labelSortableItems.destroy();
    labelSortableItems = '';
    labelSort();
}
