$(document).ready(function() {
    $('#kt_datatables_table').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        "lengthChange": false,
        'iDisplayLength': 10,
        "dom": "flrtip",
        ajax: 'roles/data/get',
        "columns": [{
            "searchable": false,
            "sortable": false,
            "data": "DT_RowIndex"
        },


            {
                "data": "name",
            },

        ],

    });
});
