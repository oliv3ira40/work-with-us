$(function()
{
    // Default Datatable
    $('.datatable').DataTable(
        {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
            }
        }
    );

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf']
    });

    // Key Tables

    $('#key-table').DataTable({
        keys: true
    });

    // Responsive Datatable
    $('#responsive-datatable').DataTable();

    // Multi Selection Datatable
    $('#selection-datatable').DataTable({
        select: {
            style: 'multi'
        }
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});