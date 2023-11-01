@extends('layouts.template')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">PostVenta</h5>
                                <small class="text-muted float-end">Detalles del Formulario Post-Venta</small>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="management_types">Tipo de Gestión</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->management) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="document">Documento</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->document }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="business_name">Razón Social</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->business_name) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="receiving_person">Contacto que recepciona</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->receiving_person) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="email_customer">Email</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->email_customer) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="titular_cellphone">Celular del Titular</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->titular_cellphone }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="address">Dirección</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->address)}}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="reference">Referencia</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->reference) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divChange_date">
                                    <label class="col-sm-3 col-form-label" for="change_date">Fecha de Cambio</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->change_date }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divPickup_date">
                                    <label class="col-sm-3 col-form-label" for="pickup_date">Fecha de Recojo</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->pickup_date }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divSupport_date">
                                    <label class="col-sm-3 col-form-label" for="support_date">Fecha de Soporte</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->support_date }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divSale_date">
                                    <label class="col-sm-3 col-form-label" for="sale_date">Fecha de Venta</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->sale_date }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divSurvey_date">
                                    <label class="col-sm-3 col-form-label" for="survey_date">Fecha de Encuesta</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->survey_date }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divSurvey_date">
                                    <label class="col-sm-3 col-form-label" for="survey_text">Encuesta</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->survey_text) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="time_ranges">Rango Horario</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->description) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divModel_text">
                                    <label class="col-sm-3 col-form-label" for="model_text">Modelo</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->model_text) }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divOld_serial">
                                    <label class="col-sm-3 col-form-label" for="old_serial">Serie Antiguo</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->old_serial }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3 d-none divChangeLogic" id="divNew_serial">
                                    <label class="col-sm-3 col-form-label" for="new_serial">Serie Nueva</label>
                                    <div class="col-sm-9">
                                        <p>{{ $form_postsale->new_serial }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="observation">Observaciones</label>
                                    <div class="col-sm-9">
                                        <p>{{ mb_strtoupper($form_postsale->observation) }}</p>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <a href="{{ route('admin.form_postsale.index') }}" id="btn" name="btn"
                                            class="btn btn-label-secondary btn-sm"><i class="bx bx-arrow-back"></i> &nbsp;
                                            REGRESAR</a>
                                    </div>
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
    <script>
        function showManagementTypes() {
            $(".divChangeLogic").addClass("d-none");

            $("#divSale_date input, #divChange_date input, #divPickup_date input, #divSupport_date input, #divSurvey_date input, #divNew_serial input, #divOld_serial input, #divModel_text input, #survey_text input").val('');

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

        $(document).ready(function() {

            showManagementTypes();

            $("#management_types").change(function() {
                showManagementTypes();

            });
        });
    </script>
@endsection
