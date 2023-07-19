function pngExport(areaId) {
    let element = document.getElementById(areaId);
    html2canvas(element).then(function (canvas) {
        return Canvas2Image.saveAsPNG(canvas);
    });
}
