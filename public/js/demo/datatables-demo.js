// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});

$(document).ready(function() {
    $('#booking').DataTable({
        scrollX: true,
    });
});

$(document).ready(function() {
    $('#pesanan').DataTable({
        scrollX: true,
        autoWidth: false
    });
});