// this function will serialize the selected task and it's children
export function serializeTasks(sortable, firstLoop = true) {
    let serialized = [];
    let children = (firstLoop === true) ? [sortable] : [].slice.call(sortable.children);
    for (let i in children) {
        let nested = children[i].querySelector('.nested-sortable');
        serialized.push({
            id: children[i].id,
            children: nested ? serializeTasks(nested, false) : []
        });
    }
    return serialized;
}
export function serializeTaskWithParents(task) {
    let serialized = [];
    // gets the div.nested-sortable
    let parent = task.parentElement;
    // gets the main parent
    parent = parent.parentElement;
    serialized.push({
        id: task.id,
        parent: parent.id !== 'grandParentTask' ? serializeTaskWithParents(parent) : []
    });

    return serialized;
}
