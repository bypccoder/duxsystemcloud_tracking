@extends('layouts.template')
@section('styles')
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/libs/toastr/toastr.css" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Importación</h5>
                                <small class="text-muted float-end">Importar Ventas</small>
                            </div>
                            <div class="card-body">
                                <div id="validation-errors" class="alert alert-danger" style="display: none;">
                                    <i class="fas fa-exclamation-circle"></i> Errores en el formulario:
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <form id="postImportNewSaleForm" method="POST"
                                    action="{{ route('admin.import_salenew.import') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="management_types">Tipo
                                            Gestión</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-table"></i></span>
                                                <select id="management_types" name="management_types"
                                                    class="select2 form-select" data-allow-clear="true">
                                                    <option value="">Seleccione..</option>
                                                    @foreach ($management_types as $management_type)
                                                        <option value="{{ $management_type->id }}">
                                                            {{ $management_type->management }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="fileImport">Archivo</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bxs-file-import"></i></span>
                                                <input type="file" id="fileImport" name="fileImport" autocomplete="off"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <a href="javascript:none;" id="formato-link" name="formato-link"
                                            class="btn btn-info btn-sm col-sm-2 d-none"><i class="bx bxs-download"></i>
                                            FORMATO</a>
                                        <a href="javascript:none;" id="error-link" name="error-link"
                                            class="btn btn-outline-danger btn-sm col-sm-2 d-none"><i
                                                class="bx bxs-download"></i>
                                            ERRORES</a>
                                        <a href="javascript:none;" id="success-link" name="error-link"
                                            class="btn btn-outline-success btn-sm col-sm-2 d-none"><i
                                                class="bx bxs-download"></i>
                                            CORRECTOS</a>
                                    </div>

                                    <div id="name-error text-danger"></div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btn" name="btn"
                                                class="btn btn-primary btn-sm">IMPORTAR</button>

                                            <a href="{{ route('admin.form_postsale.index') }}" id="btn" name="btn"
                                                class="btn btn-label-secondary btn-sm"><i class="bx bx-arrow-back"></i>
                                                &nbsp;
                                                REGRESAR</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            var formatoLink = $('#formato-link');
            $('#management_types').on('change', function() {
                formatoLink.addClass('d-none');
                var selectedType = $(this).val();
                formatoLink.attr('href', "{{ route('admin.import_salenew.export') }}" + '?type_format=' +
                    selectedType);
                formatoLink.removeClass('d-none');
            });
            // Verificar y asignar la ruta inicial cuando la página se carga
            formatoLink.on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                window.open(url, '_blank');
            });

            $('#postImportNewSaleForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, xhr) {
                        ToastManager.createCustomToast({
                            title: data.title,
                            message: data.message,
                            type: data.type
                        });

                        if (data.download_url_success) {
                            var successLink = $('#success-link');
                            successLink.attr('href',
                                "{{ route('admin.import_salenew.export_success') }}" +
                                '?nameFile=' + data.download_url_success);
                            successLink.removeClass('d-none');
                        }

                        if (xhr.status === 200) {
                            setTimeout(() => {
                                //window.location.href = 'form_postsale';
                            }, 3000);
                        }
                    },
                    error: function(data) {
                        if (data.status === 422) {
                            var errors = data.responseJSON.errors;
                            var errorHtml = '<ul>';
                            $.each(errors, function(key, value) {
                                errorHtml += '<li>' + value + '</li>';
                            });
                            errorHtml += '</ul>';
                            $('#validation-errors').html(
                                '<i class="fas fa-exclamation-circle"></i> Errores en el formulario:' +
                                errorHtml).show();
                        } else {
                            var response = data.responseText;
                            var data = JSON.parse(response);

                            //alert(data.download_url);
                            ToastManager.createCustomToast({
                                title: data.title,
                                message: data.message,
                                type: data.type
                            });


                            if (data.download_url_error) {
                                var errorLink = $('#error-link');
                                errorLink.attr('href',
                                    "{{ route('admin.import_salenew.export_errors') }}" +
                                    '?nameFile=' + data.download_url_error);
                                errorLink.removeClass('d-none');
                            }

                            if (data.download_url_success) {
                                var successLink = $('#success-link');
                                successLink.attr('href',
                                    "{{ route('admin.import_salenew.export_success') }}" +
                                    '?nameFile=' + data.download_url_success);
                                successLink.removeClass('d-none');
                            }

                        }
                    }
                });
            });

        });
    </script>
@endsection
