@extends('layouts.template')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Usuarios</h5>
                                <small class="text-muted float-end">Editar Usuarios</small>
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
                                <form id="userForm" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="txtNombre">Nombres</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control uppercase" id="txtNombre" name="name"
                                                    placeholder="John Doe" aria-label="John Doe"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{  mb_strtoupper($user->name) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="txtEmail">Email</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                <input type="text" id="txtEmail" name="email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="basic-icon-default-email2"
                                                    value="{{ $user->email }}" />
                                            </div>
                                            <div class="form-text">Puedes usar letras, números y puntos.</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="txtClave">Clave</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-key"></i></span>
                                                <input type="password" id="txtClave" name="password" class="form-control"
                                                    placeholder="Deja en blanco para no cambiar" autocomplete="new-password"
                                                    aria-label="Deja en blanco para no cambiar"
                                                    aria-describedby="basic-icon-default-key" />
                                            </div>
                                            <div class="form-text">Puedes usar letras, números y puntos.</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="rdnRol">Asignar rol</label>
                                        <div class="col-sm-10">
                                            @foreach ($roles as $role)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="roles[]"
                                                        value="{{ $role->id }}"
                                                        @if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif>
                                                    <label class="form-check-label">{{ $role->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btnRegister" name="btnRegister"
                                                class="btn btn-primary">Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xxl">
                        @include('layouts.history', [
                            'history' => $user->history->sortByDesc('created_at'),
                        ])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.uppercase').on('input', function () {
                $(this).val($(this).val().toUpperCase());
            });

            $('#userForm').on('submit', function(e) {
                e.preventDefault();
                $('#btnRegister').prop('disabled', true);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        ToastManager.createCustomToast({
                            title: data.title,
                            message: data.message,
                            type: data.type
                        });

                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 3000);

                    },
                    error: function(data) {
                        $('#btnRegister').prop('disabled', false);
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
