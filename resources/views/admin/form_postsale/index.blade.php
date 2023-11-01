@extends('layouts.template')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-left">
                    <h5 class="card-title mb-0 lead fs-3 text-primary">Lista de Post-Venta</h5>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table border-top" id="tableUserDt">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Documento</th>
                            <th>Razón Social</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        var configParams = {
            columns: [{
                    data: 'id'
                },
                {
                    data: 'document'
                },
                {
                    data: 'business_name'
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
            ajaxURL: "{{ route('admin.get.form_postsale.data') }}",
            showRouteParam: "form_postsale/show",
            editRouteParam: "form_postsale/edit",
            deleteRouteParam: "form_postsale/destroy",
            createRoute: "form_postsale/create"
        };

        // Llamar a createDataTableConfig con los parámetros
        var dataTableConfig = ExportHelper.createDataTableConfig(configParams);

        // Inicializar el DataTable en un elemento HTML específico (por ejemplo, con el ID "miDataTable")
        $('#tableUserDt').DataTable(dataTableConfig);
    </script>
@endsection
