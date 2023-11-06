@extends('layouts.template')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h6 class="text-muted">Post-Venta</h6>
                <div class="nav-align-top mb-4">
                    <ul id="myTabTask" class="nav nav-pills mb-3 nav-fill" role="tablist">
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
                                aria-controls="navs-pills-justified-agendados" aria-selected="false">
                                <i class="tf-icons  bx bx-sort-alt-2 fa-2x me-1"></i> Agendados
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-reprogramacion"
                                aria-controls="navs-pills-justified-reprogramacion" aria-selected="false">
                                <i class="tf-icons bx bx-cog fa-2x me-1"></i> Reprogramación
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-rechazados"
                                aria-controls="navs-pills-justified-rechazados" aria-selected="false">
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
                                    <table id="tableBackDt" class="table border-top">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Tipo Registro</th>
                                                <th>Documento</th>
                                                <th>Razón Social</th>
                                                <th>Tipo de Gestión</th>
                                                <th>Rango Horario</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Tipo Registro</th>
                                                <th>Documento</th>
                                                <th>Razón Social</th>
                                                <th>Tipo de Gestión</th>
                                                <th>Rango Horario</th>
                                                <th>Action</th>
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
        // Obtiene el valor de $tipoTab
        const tipoTab = "{{ $tipoTab }}";

        // Espera a que el documento esté listo
        document.addEventListener('DOMContentLoaded', () => {
            // Encuentra el elemento con el atributo data-bs-target correspondiente
            const targetSelector = `#navs-pills-justified-${tipoTab}`;
            const button = document.querySelector(`#myTabTask button[data-bs-target="${targetSelector}"]`);

            // Activa la pestaña correspondiente
            if (button) {
                button.click();
            }
        });

        var configParams = {
            columns: [{
                    data: 'id'
                },
                {
                    data: 'record_type'
                },
                {
                    data: 'document'
                },
                {
                    data: 'business_name'
                },
                {
                    data: 'management'
                },
                {
                    data: 'description'
                },
                {
                    data: ''
                }
            ],
            exportButtons: [{
                    format: 'print',
                    text: 'Imprimir'
                },
                {
                    format: 'csv',
                    text: 'Exportar CSV'
                },
                {
                    format: 'excel',
                    text: 'Exportar Excel'
                },
                {
                    format: 'pdf',
                    text: 'Exportar PDF'
                },
                {
                    format: 'copy',
                    text: 'Copiar Portapapeles'
                }
            ],
            exportColumns: [1, 2], // Modificar las columnas para exportar
            ajaxURL: "{{ route('admin.get.tasks.data') }}",
            showRouteParam: "tasks/show",
            editRouteParam: "tasks/edit",
            deleteRouteParam: "tasks/destroy",
            createRoute: ""
        };

        // Llamar a createDataTableConfig con los parámetros
        var dataTableConfig = ExportHelper.createDataTableConfig(configParams);

        // Inicializar el DataTable en un elemento HTML específico (por ejemplo, con el ID "miDataTable")
        $('#tableBackDt').DataTable(dataTableConfig);
    </script>
@endsection
