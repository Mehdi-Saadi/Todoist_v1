function pdfExport(areaId) {
    let element = document.getElementById(areaId);
    let option = {
        margin: [0, -4, 0, 0],
    }
    html2pdf().set(option).from(element).save();
}
