@extends('layouts.template')

@section('styles')
    <!-- Tus estilos personalizados si los tienes -->
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Detalles del Usuario</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="rdnRol">Roles Asignados</label>
                                    <div class="col-sm-10">
                                        @foreach ($user->roles as $role)
                                            <div class="">
                                                @php
                                                    $colors = ['info', 'primary', 'secondary', 'dark', 'success', 'warning', 'danger'];
                                                    $randomColor = $colors[array_rand($colors)];
                                                @endphp
                                                <span class="badge bg-label-{{ $randomColor }}">{{ $role->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('admin.users.index') }}" id="btn" name="btn"
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
