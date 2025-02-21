// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});

$(document).ready(function() {
    $('#booking').DataTable({
        ordering: false, // Menonaktifkan fitur pengurutan
        fixedColumns: {
            left: 6 // Mengunci 3 kolom pertama agar tetap terlihat saat di-scroll
        },
        paging: false,
        scrollX: true, // Mengaktifkan horizontal scrolling
        // scrollY: 300, // Mengatur tinggi tabel
    });
});

$(document).ready(function() {
    $('#pesanan').DataTable({
        ordering: false, // Menonaktifkan fitur pengurutan
        fixedColumns: {
            left: 7 // Mengunci 3 kolom pertama agar tetap terlihat saat di-scroll
        },
        order: [
            [1, 'asc']
        ], // Urutan berdasarkan kolom kedua (No)
        paging: false, // Mengaktifkan pagination
        scrollX: true, // Mengaktifkan horizontal scrolling
        // scrollY: 300, // Mengatur tinggi tabel
    });
});