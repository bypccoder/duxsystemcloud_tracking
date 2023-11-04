const ToastManager = {
    createCustomToast: function ({ title, message, type, animation = 'animate__animated', placement = ['top-0', 'end-0'] }) {
        var toastElement = document.createElement('div');
        toastElement.classList.add('bs-toast', 'toast', 'toast-ex', 'animate__animated', 'my-2');
        toastElement.setAttribute('role', 'alert');
        toastElement.setAttribute('aria-live', 'assertive');
        toastElement.setAttribute('aria-atomic', 'true');
        toastElement.setAttribute('data-bs-delay',"5000");
        toastElement.innerHTML = `<div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-medium">${title}</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">${message}</div>`;

        document.body.appendChild(toastElement);

        toastElement.classList.add(type, animation);

        DOMTokenList.prototype.add.apply(toastElement.classList, placement);

        var toast = new bootstrap.Toast(toastElement);
        toast.show();

        toastElement.addEventListener('hidden.bs.toast', function () {
            document.body.removeChild(toastElement);
        });
    }
};

var ExportHelper = {

    createExportButton: function (text, format, columnsToExport) {
        return {
            extend: format,
            text: text,
            className: 'dropdown-item',
            exportOptions: {
                columns: columnsToExport
            }
        };
    },

    createDataTableConfig: function (configParams) {
        return {
            dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'p>>",
            processing: true,
            serverSide: true,
            ajax: configParams.ajaxURL,
            columns: configParams.columns,
            columnDefs: [
                // Columnas personalizadas
                {
                    targets: 0,
                    orderable: false,
                    checkboxes: true,
                    render: function () {
                        return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                    },
                    checkboxes: {
                        selectAllRender: '<input type="checkbox" class="form-check-input">'
                    }
                },
                {
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        var showButton = `<a data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalle" href="/${configParams.showRouteParam}/${full.id}" class="btn btn-sm btn-icon item-edit text-info"><i class="bx bxs-detail"></i></a>`;
                        var editButton = `<a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" href="/${configParams.editRouteParam}/${full.id}" class="btn btn-sm btn-icon item-edit text-warning"><i class="bx bxs-edit"></i></a>`;
                        if (configParams.editRouteParam === '') {
                            editButton = '';
                        }
                        var deleteButton = `<a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" href="/${configParams.deleteRouteParam}/${full.id}" class="btn btn-sm btn-icon item-delete text-danger"><i class="bx bxs-trash"></i></a>`;
                        if (configParams.deleteRouteParam === '') {
                            deleteButton = '';
                        }
                        return showButton + editButton + deleteButton;
                    }
                }
            ],
            searching: true,
            orderCellsTop: true,
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [10, 25, 50, 75, 100],
            buttons: [
                (configParams.createRoute !== '') ? {
                    text: '<i class="bx bx-plus"></i> Agregar Registro',
                    className: 'btn btn-primary btn-sm',
                    action: function (e, dt, button, config) {
                        // Redirige a la página de creación de usuarios al hacer clic en el botón
                        window.location.href = configParams.createRoute;
                    }
                } : '',
                {
                    extend: 'collection',
                    className: 'btn btn-sm btn-label-primary dropdown-toggle me-2',
                    text: '<i class="bx bx-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Exportar</span>',
                    buttons: configParams.exportButtons.map(function (buttonInfo) {
                        return ExportHelper.createExportButton(buttonInfo.text, buttonInfo.format, configParams.exportColumns);
                    })
                }
            ]
        }

    }
};


