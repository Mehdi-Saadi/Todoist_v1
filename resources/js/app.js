// import './bootstrap';
// all css files
import '../css/app.css';

// sortablejs library
import Sortable from 'sortablejs/Sortable.min';
window.Sortable = Sortable;

// html2canvas , html2pdf.js , canvas2image & sweetalert library
import html2canvas from 'html2canvas/dist/html2canvas.min';
window.html2canvas = html2canvas;
import html2pdf from 'html2pdf.js/dist/html2pdf.bundle.min';
window.html2pdf = html2pdf;
import Canvas2Image from '../assets/js/canvas2image/canvas2image';
window.Canvas2Image = Canvas2Image;
import Swal from 'sweetalert2/dist/sweetalert2.all.min';
window.Swal = Swal;

// send request
import {sendRequest} from '../assets/js/sendRequest'
window.sendRequest = sendRequest;

// export
import {pngExport} from '../assets/js/pngExport';
window.pngExport = pngExport;
import {pdfExport} from '../assets/js/pdfExport';
window.pdfExport = pdfExport;

// sweetalert
import {toast_alert} from '../assets/js/alert';
window.toast_alert = toast_alert;

// show form scripts
import {showForm} from '../assets/js/showFormAndSetValue';
window.showForm = showForm;
import {scrollToBottom} from '../assets/js/showFormAndSetValue';
window.scrollToBottom = scrollToBottom;
import {hideForm} from '../assets/js/showFormAndSetValue';
window.hideForm = hideForm;
import {setValueAndShowForm} from '../assets/js/showFormAndSetValue';
window.setValueAndShowForm = setValueAndShowForm;
import {showBtn} from '../assets/js/showFormAndSetValue';
window.showBtn = showBtn;
import {hideBtn} from '../assets/js/showFormAndSetValue';
window.hideBtn = hideBtn;
