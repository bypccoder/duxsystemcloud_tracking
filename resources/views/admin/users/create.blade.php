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
                                <h5 class="mb-0">Usuarios</h5>
                                <small class="text-muted float-end">Crear Usuarios</small>
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
                                <form id="userForm" method="POST" action="{{ route('admin.users.store') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-fullname">Nombres</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="text" id="name" name="name" autocomplete="off"
                                                    class="form-control" placeholder="John Doe" aria-label="John Doe"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                <input type="text" id="email" name="email" autocomplete="off"
                                                    class="form-control" value="{{ old('email') }}" placeholder="john.doe"
                                                    aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                                            </div>
                                            <div class="form-text">Puedes usar letras, números y puntos.</div>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="password">Clave</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-key"></i></span>
                                                <input type="password" id="password" name="password"
                                                    autocomplete="new-password" class="form-control" placeholder="******"
                                                    aria-label="******" aria-describedby="basic-icon-default-key"
                                                    value="{{ old('password') }}" />
                                            </div>
                                            <div class="form-text">Puedes usar letras, números y puntos.</div>

                                        </div>
                                    </div>
                                    <div id="name-error text-danger"></div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btn" name="btn"
                                                class="btn btn-primary btn-sm">GUARDAR</button>

                                            <a href="{{ route('admin.users.index') }}" id="btn" name="btn"
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
    <script src="{{ url('assets') }}/vendor/libs/toastr/toastr.js"></script>

    {{-- <script src="{{ url('assets') }}/js/ui-toasts.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#userForm').on('submit', function(e) {
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
