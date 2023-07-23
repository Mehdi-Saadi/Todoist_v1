const labels = document.getElementById('labels');

new Sortable(labels, {
    animation: 150,
    fallbackOnBody: true,
    swapThreshold: 0.65,
    onEnd: function () {
        // serialize the labels ondrop

        function serialize(sortable) {
            let serialized = [];
            for (let i in sortable) {
                serialized.push({
                    id: sortable[i].dataset['sortableId'],
                });
            }
            return serialized;
        }

        // serialize and send tasks with ajax to server
        sendRequest('put', '/labels/update', serialize(labels), function () {
            console.log('done');
        });
    }
});
