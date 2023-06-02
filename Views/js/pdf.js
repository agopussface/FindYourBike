$(document).ready(function() {
    $('#generate-pdf').on('click', function() {
        html2canvas(document.querySelector('#trimChart')).then(function(trimCanvas) {
            html2canvas(document.querySelector('#yearChart')).then(function(yearCanvas) {
                var pdf = new jsPDF('p', 'mm', 'a4');
                var trimImgData = trimCanvas.toDataURL('image/png');
                var yearImgData = yearCanvas.toDataURL('image/png');
                pdf.addImage(trimImgData, 'PNG', 10, 10);
                pdf.addImage(yearImgData, 'PNG', 10, 150);
                pdf.save('charts.pdf');
            });
        });
    });
});
