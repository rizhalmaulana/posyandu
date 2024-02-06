'use strict';

(function() {
    var dt_ajax_table = $('.datatables-ajax'),
    dt_filter_table = $('.dt-column-search'),
    dt_adv_filter_table = $('.dt-advanced-search'),
    dt_responsive_table = $('.dt-responsive'),
    dt_kunjungan_table = $('.kunjungan-responsive'),
    startDateEle = $('.start_date'),
    endDateEle = $('.end_date');
    
    // Filter column wise function
    function filterColumn(i, val) {
        if (i == 5) {
            var startDate = startDateEle.val(),
            endDate = endDateEle.val();
            if (startDate !== '' && endDate !== '') {
                $.fn.dataTableExt.afnFiltering.length = 0; // Reset datatable filter
                dt_adv_filter_table.dataTable().fnDraw(); // Draw table after filter
                filterByDate(i, startDate, endDate); // We call our filter function
            }
            dt_adv_filter_table.dataTable().fnDraw();
        } else {
            dt_adv_filter_table.DataTable().column(i).search(val, false, true).draw();
        }
    }
    
    // on key up from input field
    $('input.dt-input').on('keyup', function () {
        filterColumn($(this).attr('data-column'), $(this).val());
    });
    
    // Responsive Table
    // --------------------------------------------------------------------
    
    if (dt_responsive_table.length) {
        var dt_responsive = dt_responsive_table.DataTable({
            ajax: {
                url: `/dashboard/menu/data-balita`
            },
            columns: [
                { data: '' },
                { data: 'nama_lengkap' },
                { data: 'jenis_kelamin' },
                { data: 'tanggal_lahir' },
                { data: 'nama_posyandu' },
                { data: 'nama_ayah' },
                { data: '' },
            ],
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: 0,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // Actions
                    targets: -1,
                    searchable: false,
                    title: "Aksi",
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon me-2 editDataBalita" data-id="'+full["id"]+'"><i class="mdi mdi-pencil-outline mdi-20px"></i></button>' +
                            '<button class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon me-2 viewDataBalita" data-id="'+full["id"]+'"><i class="mdi mdi-eye-outline mdi-20px"></i></button>' +
                            '<button class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon deleteDataBalita" data-id="'+full["id"]+'"><i class="mdi mdi-delete-outline mdi-20px"></i></button></span>'
                        );
                    },
                },
            ],
            // scrollX: true,
            destroy: true,
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['nama_lengkap'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                            col.rowIndex +
                            '" data-dt-column="' +
                            col.columnIndex +
                            '">' +
                            '<td>' +
                            col.title +
                            ':' +
                            '</td> ' +
                            '<td>' +
                            col.data +
                            '</td>' +
                            '</tr>'
                            : '';
                        }).join('');
                        
                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            }
        });
    }

    if (dt_kunjungan_table.length) {
        // Get the path of the current URL
        var path = window.location.pathname;

        // Split the path into segments using '/'
        var segments = path.split('/');

        // Remove the first empty element (resulting from the leading '/')
        segments.shift();
        
        var dt_responsive = dt_kunjungan_table.DataTable({
            ajax: {
                url: `/dashboard/periksa/`+ segments[2]
            },
            columns: [
                { data: '' },
                { data: 'tgl_kunjungan' },
                { data: 'status_kunjungan' },
                { data: '' },
            ],
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: 0,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // Actions
                    targets: -1,
                    searchable: false,
                    title: "Aksi",
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon me-2 editDataBalita" data-id="'+full["id"]+'"><i class="mdi mdi-pencil-outline mdi-20px"></i></button>' +
                            '<button class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon me-2 viewDataBalita" data-id="'+full["id"]+'"><i class="mdi mdi-eye-outline mdi-20px"></i></button>' +
                            '<button class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon deleteDataBalita" data-id="'+full["id"]+'"><i class="mdi mdi-delete-outline mdi-20px"></i></button></span>'
                        );
                    },
                },
            ],
            // scrollX: true,
            destroy: true,
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['nama_lengkap'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                            col.rowIndex +
                            '" data-dt-column="' +
                            col.columnIndex +
                            '">' +
                            '<td>' +
                            col.title +
                            ':' +
                            '</td> ' +
                            '<td>' +
                            col.data +
                            '</td>' +
                            '</tr>'
                            : '';
                        }).join('');
                        
                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            }
        });
    }
})();