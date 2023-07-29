// this function will serialize the selected task and it's children
export function serializeTasks(sortable, firstLoop = true) {
    let serialized = [];
    let children = (firstLoop === true) ? [sortable] : [].slice.call(sortable.children);
    for (let i in children) {
        let nested = children[i].querySelector('.nested-sortable');
        serialized.push({
            id: children[i].dataset['sortableId'],
            children: nested ? serializeTasks(nested, false) : []
        });
    }
    return serialized;
}
