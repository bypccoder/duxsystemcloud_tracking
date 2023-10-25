@extends('layouts.template')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h6 class="text-muted">Post-Venta</h6>
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-nuevos" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons bx bx-bar-chart-alt-2 fa-2x me-1"></i> Nuevos
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-agendados"
                                aria-controls="navs-pills-justified-profile" aria-selected="false">
                                <i class="tf-icons  bx bx-sort-alt-2 fa-2x me-1"></i> Agendados
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-reprogramacion"
                                aria-controls="navs-pills-justified-messages" aria-selected="false">
                                <i class="tf-icons bx bx-cog fa-2x me-1"></i> Reprogramación
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-rechazados"
                                aria-controls="navs-pills-justified-messages" aria-selected="false">
                                <i class="tf-icons bx bx-shield-x fa-2x me-1"></i> Rechazados
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-nuevos" role="tabpanel">
                            <p>
                            <div class="card">
                                <h5 class="card-header">Busqueda Avanzada</h5>
                                <!--Search Form -->
                                <div class="card-body">
                                    <form class="dt_adv_search" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row g-3">
                                                    <div class="col-4 col-sm-6 col-lg-4">
                                                        <label class="form-label">Fecha:</label>
                                                        <div class="mb-0">
                                                            <input type="text"
                                                                class="form-control dt-date flatpickr-range dt-input"
                                                                data-column="5" placeholder="StartDate to EndDate"
                                                                data-column-index="4" name="dt_date" />
                                                            <input type="hidden"
                                                                class="form-control dt-date start_date dt-input"
                                                                data-column="5" data-column-index="4"
                                                                name="value_from_start_date" />
                                                            <input type="hidden"
                                                                class="form-control dt-date end_date dt-input"
                                                                name="value_from_end_date" data-column="5"
                                                                data-column-index="4" />
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-sm-6 col-lg-4">
                                                        <label class="form-label">Tipo de
                                                            Gestión:</label>
                                                        <input type="text" class="form-control dt-input dt-full-name"
                                                            data-column="1" placeholder="Alaric Beslier"
                                                            data-column-index="0" />
                                                    </div>
                                                    <div class="col-4 col-sm-6 col-lg-4">
                                                        <label class="form-label">Motorizado:</label>
                                                        <input type="text" class="form-control dt-input" data-column="2"
                                                            placeholder="demo@example.com" data-column-index="1" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr class="mt-0" />
                                <div class="card-datatable table-responsive">
                                    <table id="tbl_Nuevos" class="table border-top">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Tarea</th>
                                                <th>Fecha Creación</th>
                                                <th>Motorizado</th>
                                                <th>Tipo Gestión</th>
                                                <th>Prioridad</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Tarea</th>
                                                <th>Fecha Creación</th>
                                                <th>Motorizado</th>
                                                <th>Tipo Gestión</th>
                                                <th>Prioridad</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-agendados" role="tabpanel">
                            <p>
                                Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer
                                candy oat cake ice
                                cream. Gummies halvah tootsie roll muffin biscuit icing dessert
                                gingerbread. Pastry ice cream
                                cheesecake fruitcake.
                            </p>
                            <p class="mb-0">
                                Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin
                                pie tiramisu halvah
                                cotton candy liquorice caramels.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-reprogramacion" role="tabpanel">
                            <p>
                                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans
                                macaroon gummies
                                cupcake gummi bears cake chocolate.
                            </p>
                            <p class="mb-0">
                                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple
                                pie brownie cake. Sweet
                                roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert
                                dessert. Pudding jelly
                                jelly-o tart brownie jelly.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-rechazados" role="tabpanel">
                            <p>
                                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans
                                macaroon gummies
                                cupcake gummi bears cake chocolate.
                            </p>
                            <p class="mb-0">
                                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple
                                pie brownie cake. Sweet
                                roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert
                                dessert. Pudding jelly
                                jelly-o tart brownie jelly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var dt_adv_filter_table = $('#tbl_Nuevos');
        var exportColumns = [3, 4]; // Columnas para exportar

        function customizeExport(inner) {
            if (inner.length <= 0) return inner;
            var el = $.parseHTML(inner);
            var result = '';
            $.each(el, function(index, item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                    result = result + item.lastChild.firstChild.textContent;
                } else if (item.innerText === undefined) {
                    result = result + item.textContent;
                } else {
                    result = result + item.innerText;
                }
            });
            return result;
        }

        var dt_adv_filter = dt_adv_filter_table.DataTable({
            dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'p>>",
            ajax: assetsPath + 'json/table-datatable.json',

            columns: [{
                    data: ''
                },
                {
                    data: 'full_name'
                },
                {
                    data: 'start_date'
                },
                {
                    data: 'post'
                },
                {
                    data: 'city'
                },
                {
                    data: 'email'
                }
            ],
            columnDefs: [

                {
                    className: 'control',
                    orderable: false,
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return '';
                    }
                },
                {
                    width: '20%',
                    targets: 2,
                }
            ],
            orderCellsTop: true,
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [10, 25, 50, 75, 100],
            buttons: [{
                extend: 'collection',
                className: 'btn btn-label-primary dropdown-toggle me-2',
                text: '<i class="bx bx-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                buttons: [{
                        extend: 'print',
                        text: '<i class="bx bx-printer me-1" ></i>Print',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item.classList
                                            .contains('user-name')) {
                                            result = result + item.lastChild.firstChild
                                                .textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        },
                        customize: function(win) {
                            //customize print view for dark
                            $(win.document.body)
                                .css('color', config.colors.headingColor)
                                .css('border-color', config.colors.borderColor)
                                .css('background-color', config.colors.bodyBg);
                            $(win.document.body)
                                .find('table')
                                .addClass('compact')
                                .css('color', 'inherit')
                                .css('border-color', 'inherit')
                                .css('background-color', 'inherit');
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="bx bx-file me-1" ></i>Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item.classList
                                            .contains('user-name')) {
                                            result = result + item.lastChild.firstChild
                                                .textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="bx bxs-file-export me-1"></i>Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item.classList
                                            .contains('user-name')) {
                                            result = result + item.lastChild.firstChild
                                                .textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="bx bxs-file-pdf me-1"></i>Pdf',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item.classList
                                            .contains('user-name')) {
                                            result = result + item.lastChild.firstChild
                                                .textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    },
                    {
                        extend: 'copy',
                        text: '<i class="bx bx-copy me-1" ></i>Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item.classList
                                            .contains('user-name')) {
                                            result = result + item.lastChild.firstChild
                                                .textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    }
                ]
            }]
        });
    </script>
@endsection
