$(document).ready(function () {

    /* ==========================================================================
     Tables
     ========================================================================== */

    var $table = $('#table'),
            $remove = $('#remove'),
            selections = [];

    function totalTextFormatter(data) {
        return 'Total';
    }

    function totalNameFormatter(data) {
        return data.length;
    }

    function totalPriceFormatter(data) {
        var total = 0;
        $.each(data, function (i, row) {
            total += +(row.price.substring(1));
        });
        return total;
    }

    function statusFormatter(data, rowData, index) {
        var classBtn = '',
                classDropup = '',
                pageSize = 10;

        if (index >= pageSize / 2) {
            classDropup = 'dropup';
        }

    }

    window.operateEvents = {
        'click .like': function (e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row));
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
        }
    };

    function operateFormatter(value, row, index) {
        return [
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        });
    }

    var data = [
        {
            "id": 0,
            "name": "TESTE",
            "price": "$0"
        },
        {
            "id": 1,
            "name": "Pending",
            "price": "$20"
        },
        {
            "id": 2,
            "name": "Moderation",
            "price": "$55"
        },
        {
            "id": 3,
            "name": "Published",
            "price": "$120"
        }
    ];
    $table.bootstrapTable({
        iconsPrefix: 'font-icon',
        icons: {
            paginationSwitchDown: 'font-icon-arrow-square-down',
            paginationSwitchUp: 'font-icon-arrow-square-down up',
            refresh: 'font-icon-refresh',
            toggle: 'font-icon-list-square',
            columns: 'font-icon-list-rotate',
            export: 'font-icon-download'
        },
        paginationPreText: '<i class="font-icon font-icon-arrow-left"></i>',
        paginationNextText: '<i class="font-icon font-icon-arrow-right"></i>',
        data: data,
        columns: [
            [
                {
                    //COLOCAR NOME DO WIC
                    title: 'WIC PLANNER NAME',
                    colspan: 8,
                    align: 'center'
                }
            ],
            [
                {
                    field: 'id',
                    title: 'SERVICE ID',
                    sortable: true,
                    editable: true,
                    //formatter: statusFormatter,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                },
                {
                    field: 'name',
                    title: 'SERVICE NAME',
                    sortable: true,
                    editable: true,
                    //formatter: statusFormatter,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                },
                {
                    field: 'price',
                    title: 'ORGANIZATION SERVICE',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalPriceFormatter
                },
                {
                    field: 'operate',
                    title: 'DELETE',
                    align: 'center',
                    events: operateEvents,
                    formatter: operateFormatter
                }
            ]
        ]
    });

    $('#toolbar').find('select').change(function () {
        $table.bootstrapTable('refreshOptions', {
            exportDataType: $(this).val()
        });
    });

    /* ========================================================================== */
});
