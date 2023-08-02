// this function will serialize the selected task and it's children
import {serializeTasks} from '../assets/js/serializeTasks';
window.serializeTasks = serializeTasks;

// set priority value on click
import {selectPriority} from '../assets/js/selectPriority';
window.selectPriority = selectPriority;

// the done circle effects
import {showCheck} from '../assets/js/doneCircleEffect';
window.showCheck = showCheck;
import {showCircle} from '../assets/js/doneCircleEffect';
window.showCircle = showCircle;
import {serializeAndSendRequestDone} from '../assets/js/doneCircleEffect';
window.serializeAndSendRequestDone = serializeAndSendRequestDone;
import {serializeAndSendRequestNotDone} from '../assets/js/doneCircleEffect';
window.serializeAndSendRequestNotDone = serializeAndSendRequestNotDone;

// sortable scripts
import {taskSort} from '../assets/js/taskSort';
window.taskSort = taskSort;

// sends ajax request for adding new tasks
import '../assets/js/addTaskRequest';

import {deleteTask} from "../assets/js/taskDropDown";
window.deleteTask = deleteTask;

import {showCompletedClicked} from '../assets/js/showAndHideTask';
window.showCompletedClicked = showCompletedClicked;

import {hideCompletedClicked} from '../assets/js/showAndHideTask';
window.hideCompletedClicked = hideCompletedClicked;
