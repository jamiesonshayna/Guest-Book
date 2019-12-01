// to toggle back to the guest book form with click of home button
$('#home-button').on("click", function() {
    window.location.href = "guestbook.html";
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