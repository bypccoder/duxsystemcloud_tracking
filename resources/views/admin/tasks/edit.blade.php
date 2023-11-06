@extends('layouts.template')
@section('styles')
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/libs/toastr/toastr.css" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Backoffice</h5>
                        <small class="text-muted float-end">Crear Formulario Backoffice</small>
                    </div>
                    <div class="card-body">
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-postsale" aria-controls="navs-justified-postsale"
                                        aria-selected="true">
                                        <i class="tf-icons bx bx-table me-1"></i> Post-Venta
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-back" aria-controls="navs-justified-back"
                                        aria-selected="true">
                                        <i class="tf-icons bx bxs-user-rectangle me-1"></i> Backoffice
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-history" aria-controls="navs-justified-history"
                                        aria-selected="false">
                                        <i class="tf-icons bx bxs-user-detail me-1"></i> Historial
                                        <span
                                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">{{ count($form_postsale->history) }}</span>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="navs-justified-postsale" role="tabpanel">
                                    <p>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="management_types">Tipo
                                            Gestión</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-table"></i></span>
                                                <select disabled id="management_types" name="management_types"
                                                    class="select2 form-select" data-allow-clear="true">
                                                    <option value="">Seleccione..</option>
                                                    @foreach ($management_types as $management_type)
                                                        <option @if ($management_type->id == $form_postsale->management_type_id) selected @endif
                                                            value="{{ $management_type->id }}">
                                                            {{ $management_type->management }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <label class="col-sm-2 col-form-label" for="document">Documento</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bxs-id-card"></i></span>
                                                <input disabled type="text" id="document" name="document"
                                                    autocomplete="off" class="form-control" placeholder=""
                                                    value="{{ $form_postsale->document }}">
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label" for="business_name">Razón Social</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-buildings"></i></span>
                                                <input disabled type="text" id="business_name" name="business_name"
                                                    autocomplete="off" class="form-control uppercase" placeholder=""
                                                    value="{{ mb_strtoupper($form_postsale->business_name) }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="receiving_person">Contacto que
                                            recepciona</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input disabled type="text" id="receiving_person" name="receiving_person"
                                                    autocomplete="off" class="form-control uppercase"
                                                    value="{{ mb_strtoupper($form_postsale->receiving_person) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="email_customer">Email</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                <input disabled type="text" id="email_customer" name="email_customer"
                                                    autocomplete="off" class="form-control uppercase"
                                                    value="{{ mb_strtoupper($form_postsale->email_customer) }}" />
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label" for="titular_cellphone">Celular del
                                            Titular</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                                <input disabled type="text" id="titular_cellphone"
                                                    name="titular_cellphone" autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->titular_cellphone }}" />
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="address">Dirección</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <textarea disabled id="address" name="address" autocomplete="off" class="form-control uppercase">{{ mb_strtoupper($form_postsale->address) }}</textarea>
                                            </div>

                                        </div>
                                        <label class="col-sm-2 col-form-label" for="reference">Referencia</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <textarea disabled id="reference" name="reference" autocomplete="off" class="form-control uppercase">{{ mb_strtoupper($form_postsale->reference) }}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divChange_date">
                                        <label class="col-sm-2 col-form-label" for="change_date">Fecha de
                                            Cambio</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                <input disabled type="date" id="change_date" name="change_date"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->change_date }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divPickup_date">
                                        <label class="col-sm-2 col-form-label" for="pickup_date">Fecha de
                                            Recojo</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                <input disabled type="date" id="change_date" name="pickup_date"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->pickup_date }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divSupport_date">
                                        <label class="col-sm-2 col-form-label" for="support_date">Fecha de
                                            Soporte</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                <input disabled type="date" id="support_date" name="support_date"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->support_date }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divSale_date">
                                        <label class="col-sm-2 col-form-label" for="sale_date">Fecha de
                                            Venta</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                <input disabled type="date" id="sale_date" name="sale_date"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->sale_date }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divSurvey_date">
                                        <label class="col-sm-2 col-form-label" for="survey_date">Fecha de
                                            Encuesta
                                        </label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                <input disabled type="text" id="survey_date" name="survey_date"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->survey_date }}" />
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label" for="survey_text">
                                            Encuesta</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bxs-book-content"></i></span>
                                                <input disabled type="text" id="survey_text" name="survey_text"
                                                    autocomplete="off" class="form-control uppercase"
                                                    value="{{ mb_strtoupper($form_postsale->survey_text) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="time_ranges">Rango Horario</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-time"></i></span>
                                                <select disabled id="time_ranges" name="time_ranges"
                                                    class="select2 form-select" data-allow-clear="true">
                                                    <option value="">Seleccione..</option>
                                                    @foreach ($time_ranges as $time_range)
                                                        <option @if ($time_range->id == $form_postsale->time_ranges_id) selected @endif
                                                            value="{{ $time_range->id }}">
                                                            {{ $time_range->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divModel_text">
                                        <label class="col-sm-2 col-form-label" for="model_text">Modelo</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-folder"></i></span>
                                                <input disabled type="text" id="model_text" name="model_text"
                                                    autocomplete="off" class="form-control uppercase"
                                                    value="{{ mb_strtoupper($form_postsale->model_text) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divOld_serial">
                                        <label class="col-sm-2 col-form-label" for="old_serial">Serie Antiguo</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-table"></i></span>
                                                <input disabled type="text" id="old_serial" name="old_serial"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->old_serial }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-none divChangeLogic" id="divNew_serial">
                                        <label class="col-sm-2 col-form-label" for="new_serial">Serie Nueva</label>
                                        <div class="col-sm-4">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-table"></i></span>
                                                <input disabled type="text" id="new_serial" name="new_serial"
                                                    autocomplete="off" class="form-control"
                                                    value="{{ $form_postsale->new_serial }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="observation">Observaciones</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">

                                                <textarea disabled id="observation" name="observation" autocomplete="off" class="form-control uppercase">{{ mb_strtoupper($form_postsale->observation) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade show active" id="navs-justified-back" role="tabpanel">
                                    <p>
                                    <form id="backForm" method="POST"
                                        action="{{ route('admin.form_postsale.update', $form_postsale->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div id="validation-errors" class="alert alert-danger" style="display: none;">
                                            <i class="fas fa-exclamation-circle"></i> Errores en el formulario:
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="type_equipament">Tipo de
                                                Equipo</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="bx bx-table"></i></span>
                                                    <select id="type_equipament" name="type_equipament"
                                                        class="select2 form-select" data-allow-clear="true">
                                                        <option value="">Seleccione..</option>
                                                        @foreach ($warehouse_state_types as $warehouse_state_type)
                                                            <option @if ($warehouse_state_type->id == $form_postsale->warehouse_state_type_id) selected @endif
                                                                value="{{ $warehouse_state_type->id }}">
                                                                {{ $warehouse_state_type->type_equipment_state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <label class="col-sm-2 col-form-label" for="document">Modelo</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="bx bxs-id-card"></i></span>
                                                    <input type="text" id="document" name="document"
                                                        autocomplete="off" class="form-control" placeholder=""
                                                        value="{{ old('document') }}">
                                                </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label" for="business_name">Serie de
                                                Equipo</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="bx bx-search"></i></span>
                                                    <input type="text" id="business_name" name="business_name"
                                                        autocomplete="off" class="form-control uppercase" placeholder=""
                                                        value="{{ old('business_name') }}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="result1">Resultado 1</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-table"></i></span>
                                                    <select id="result1" name="result1" class="select2 form-select"
                                                        data-allow-clear="true">
                                                        <option value="">Seleccione..</option>
                                                        @foreach ($result1s_back as $result1_back)
                                                            <option @if ($result1_back->id == $form_postsale->result1_backs_id) selected @endif
                                                                value="{{ $result1_back->id }}">
                                                                {{ $result1_back->result }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label" for="result2">Resultado 2</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-table"></i></span>
                                                    <select id="result2" name="result2" class="select2 form-select"
                                                        data-allow-clear="true">
                                                        <option value="">Seleccione..</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="titular_cellphone">Fecha de
                                                Entrega</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                    <input type="text" id="titular_cellphone" name="titular_cellphone"
                                                        autocomplete="off" class="form-control"
                                                        value="{{ old('titular_cellphone') }}" />
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="address">Hora de Entrega</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-time"></i></span>
                                                    <input type="text" id="titular_cellphone" name="titular_cellphone"
                                                        autocomplete="off" class="form-control"
                                                        value="{{ old('titular_cellphone') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="titular_cellphone">Motorizado</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                    <input type="text" id="titular_cellphone" name="titular_cellphone"
                                                        autocomplete="off" class="form-control"
                                                        value="{{ old('titular_cellphone') }}" />
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="address">Referencia</label>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-time"></i></span>
                                                    <input type="text" id="titular_cellphone" name="titular_cellphone"
                                                        autocomplete="off" class="form-control"
                                                        value="{{ old('titular_cellphone') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="observation">Observaciones</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">

                                                    <textarea id="observation" name="observation" autocomplete="off" class="form-control uppercase">{{ old('observation') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="name-error text-danger"></div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" id="btn" name="btn"
                                                    class="btn btn-primary btn-sm">GUARDAR</button>

                                                <a href="{{ route('admin.tasks.index', ['tipoTab' => 'nuevos']) }}"
                                                    id="btn" name="btn"
                                                    class="btn btn-label-secondary btn-sm"><i
                                                        class="bx bx-arrow-back"></i>
                                                    &nbsp;
                                                    REGRESAR</a>
                                            </div>
                                        </div>
                                    </form>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="navs-justified-history" role="tabpanel">
                                    <p>
                                        @include('layouts.history', [
                                            'history' => $form_postsale->history->sortByDesc('created_at'),
                                        ])
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url('assets') }}/vendor/libs/toastr/toastr.js"></script>

    {{-- <script src="{{ url('assets') }}/js/ui-toasts.js"></script> --}}
    <script>
        function showManagementTypes() {
            $(".divChangeLogic").addClass("d-none");

            let management_types = $("#management_types").val();

            if (management_types == 1) {
                $("#divSale_date, #divNew_serial,#divModel_text").removeClass("d-none");
            } else if (management_types == 2) {
                $("#divChange_date, #divOld_serial,#divModel_text").removeClass("d-none");
            } else if (management_types == 3) {
                $("#divPickup_date, #divOld_serial,#divModel_text").removeClass("d-none");
            } else if (management_types == 4) {
                $("#divSupport_date, #divOld_serial,#divModel_text").removeClass("d-none");
            } else if (management_types == 5) {
                $("#divSurvey_date, #survey_text").removeClass("d-none");
            }
        }

        function showResult2() {
            var result1_id = $("#result1").val();

            $.ajax({
                type: 'GET',
                url: '/get-result2',
                data: {
                    result1_id: result1_id
                },
                success: function(data) {
                    var result2Select = $("#result2");
                    result2Select.empty();

                    result2Select.append($('<option>', {
                            value: '',
                            text: 'Seleccione..'
                        }));

                    $.each(data, function(key, value) {
                        result2Select.append($('<option>', {
                            value: key,
                            text: value
                        }));
                    });
                },
                error: function(data) {
                    // Manejar errores si es necesario
                }
            });
        }

        $(document).ready(function() {

            showManagementTypes();
            showResult2();

            let selectResult1 = document.getElementById("result1");
            selectResult1.addEventListener("change", function() {
                showResult2();
            });

            let selectManagementTypes = document.getElementById("management_types");
            selectManagementTypes.addEventListener("change", function() {

                $("#divSale_date input, #divChange_date input, #divPickup_date input, #divSupport_date input, #divSurvey_date input, #divNew_serial input, #divOld_serial input, #divModel_text input, #survey_text input")
                    .val('');

                showManagementTypes();

            });

            $('.uppercase').on('input', function() {
                $(this).val($(this).val().toUpperCase());
            });

            $('#postSaleForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {

                        ToastManager.createCustomToast({
                            title: data.title,
                            message: data.message,
                            type: 'bg-success'
                        });

                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 3000);


                    },
                    error: function(data) {
                        if (data.status === 422) {
                            // Si hay errores de validación, muestra los mensajes de error en un alert danger
                            var errors = data.responseJSON.errors;
                            var errorHtml = '<ul>';
                            $.each(errors, function(key, value) {
                                errorHtml += '<li>' + value + '</li>';
                            });
                            errorHtml += '</ul>';

                            // Actualiza el contenido del elemento alert y muestra
                            $('#validation-errors').html(
                                '<i class="fas fa-exclamation-circle"></i> Errores en el formulario:' +
                                errorHtml).show();
                        }
                    }
                });
            });
        });
    </script>
@endsection
