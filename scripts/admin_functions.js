$('#logout-button').on('click', function() {
    window.location.href = 'logout.php';
});

// jquery plugin to allow modal popup when the width of table decreases and less columns show
$('#guestbook-table').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal( {
                header: function ( row ) {
                    var data = row.data();
                    return 'Details for '+data[0];
                }
            } ),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                tableClass: 'table'
            } )
        }
    }
} );