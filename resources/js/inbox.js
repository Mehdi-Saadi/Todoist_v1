// this function will serialize the selected task and it's children
import {serializeTasks} from '../assets/js/serializeTasks';
window.serializeTasks = serializeTasks;
// this function will serialize the selected task and it's parents
import {serializeTaskWithParents} from '../assets/js/serializeTasks';
window.serializeTaskWithParents = serializeTaskWithParents;

// set priority value on click
import {selectPriority} from '../assets/js/selectPriority';
window.selectPriority = selectPriority;
import {selectPriorityTaskDetails} from '../assets/js/selectPriority';
window.selectPriorityTaskDetails = selectPriorityTaskDetails;

// the done circle effects
import {showCheck} from '../assets/js/doneCircleEffect';
window.showCheck = showCheck;
import {showCircle} from '../assets/js/doneCircleEffect';
window.showCircle = showCircle;
import {serializeAndSendRequestDone} from '../assets/js/doneCircleEffect';
window.serializeAndSendRequestDone = serializeAndSendRequestDone;
import {serializeAndSendRequestNotDone} from '../assets/js/doneCircleEffect';
window.serializeAndSendRequestNotDone = serializeAndSendRequestNotDone;
import {serializeAndSendRequestDoneTaskDetail} from '../assets/js/doneCircleEffect';
window.serializeAndSendRequestDoneTaskDetail = serializeAndSendRequestDoneTaskDetail;
import {serializeAndSendRequestNotDoneTaskDetail} from '../assets/js/doneCircleEffect';
window.serializeAndSendRequestNotDoneTaskDetail = serializeAndSendRequestNotDoneTaskDetail;

// sortable scripts
import {taskSort} from '../assets/js/taskSort';
window.taskSort = taskSort;
import {taskResort} from '../assets/js/taskSort';
window.taskResort = taskResort;
import {sortableItems} from '../assets/js/taskSort';
window.sortableItems = sortableItems;

// sends ajax request for adding new tasks
import {submitTask} from '../assets/js/addTaskRequest';
window.submitTask = submitTask;
submitTask('taskForm', 'main');

import {deleteTask} from "../assets/js/taskDropDown";
window.deleteTask = deleteTask;

import {showCompletedClicked} from '../assets/js/showAndHideTask';
window.showCompletedClicked = showCompletedClicked;
import {hideCompletedClicked} from '../assets/js/showAndHideTask';
window.hideCompletedClicked = hideCompletedClicked;

import {selectLabel} from '../assets/js/selectLabel';
window.selectLabel = selectLabel;
import {deleteLabel} from '../assets/js/selectLabel';
window.deleteLabel = deleteLabel;
