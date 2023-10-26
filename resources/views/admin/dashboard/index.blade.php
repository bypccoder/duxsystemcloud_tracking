@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="{{ url('assets') }}/libs/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="{{ url('assets') }}/vendor/css/pages/app-calendar.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/css/pages/app-logistics-dashboard.css" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-list" aria-controls="navs-pills-list" aria-selected="true">
                                <i class="tf-icons bx bx-bar-chart-alt-2 fa-2x me-1"></i> Lista
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-calendar" aria-controls="navs-pills-calendar"
                                aria-selected="false">
                                <i class="tf-icons  bx bx-sort-alt-2 fa-2x me-1"></i> Calendario
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-dashboard" aria-controls="navs-pills-dashboard"
                                aria-selected="false">
                                <i class="tf-icons bx bx-cog fa-2x me-1"></i> Dashboard
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-list" role="tabpanel">
                            <p>

                            <div class="col-lg-12 col-md-12 order-1">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Nuevos</span>
                                                <h3 class="card-title text-nowrap mb-1">2300</h3>
                                                <small class="text-success fw-medium"> 28.42%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Reprogramados</span>
                                                <h3 class="card-title text-nowrap mb-1">2300</h3>
                                                <small class="text-success fw-medium"> 28.42%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Agendados</span>
                                                <h3 class="card-title text-nowrap mb-1">10500</h3>
                                                <small class="text-success fw-medium"> 28.42%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Rechazados</span>
                                                <h3 class="card-title text-nowrap mb-1">15300</h3>
                                                <small class="text-success fw-medium"> 28.42%</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                        <input type="text" class="form-control dt-input"
                                                            data-column="2" placeholder="demo@example.com"
                                                            data-column-index="1" />
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
                        <div class="tab-pane fade" id="navs-pills-calendar" role="tabpanel">
                            <p>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="card app-calendar-wrapper">
                                    <div class="row g-0">
                                        <!-- Calendar Sidebar -->
                                        <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                                            <div class="border-bottom p-4 my-sm-0 mb-3">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary btn-toggle-sidebar"
                                                        data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar"
                                                        aria-controls="addEventSidebar">
                                                        <i class="bx bx-plus me-1"></i>
                                                        <span class="align-middle">Add Event</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="p-4">
                                                <!-- inline calendar (flatpicker) -->
                                                <div class="ms-n2">
                                                    <div class="inline-calendar"></div>
                                                </div>

                                                <hr class="container-m-nx my-4" />

                                                <!-- Filter -->
                                                <div class="mb-4">
                                                    <small
                                                        class="text-small text-muted text-uppercase align-middle">Filter</small>
                                                </div>

                                                <div class="form-check mb-2">
                                                    <input class="form-check-input select-all" type="checkbox"
                                                        id="selectAll" data-value="all" checked />
                                                    <label class="form-check-label" for="selectAll">View All</label>
                                                </div>

                                                <div class="app-calendar-events-filter">
                                                    <div class="form-check form-check-danger mb-2">
                                                        <input class="form-check-input input-filter" type="checkbox"
                                                            id="select-personal" data-value="personal" checked />
                                                        <label class="form-check-label"
                                                            for="select-personal">Personal</label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input input-filter" type="checkbox"
                                                            id="select-business" data-value="business" checked />
                                                        <label class="form-check-label"
                                                            for="select-business">Business</label>
                                                    </div>
                                                    <div class="form-check form-check-warning mb-2">
                                                        <input class="form-check-input input-filter" type="checkbox"
                                                            id="select-family" data-value="family" checked />
                                                        <label class="form-check-label" for="select-family">Family</label>
                                                    </div>
                                                    <div class="form-check form-check-success mb-2">
                                                        <input class="form-check-input input-filter" type="checkbox"
                                                            id="select-holiday" data-value="holiday" checked />
                                                        <label class="form-check-label"
                                                            for="select-holiday">Holiday</label>
                                                    </div>
                                                    <div class="form-check form-check-info">
                                                        <input class="form-check-input input-filter" type="checkbox"
                                                            id="select-etc" data-value="etc" checked />
                                                        <label class="form-check-label" for="select-etc">ETC</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Calendar Sidebar -->

                                        <!-- Calendar & Modal -->
                                        <div class="col app-calendar-content">
                                            <div class="card shadow-none border-0">
                                                <div class="card-body pb-0">
                                                    <!-- FullCalendar -->
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                            <div class="app-overlay"></div>
                                            <!-- FullCalendar Offcanvas -->
                                            <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1"
                                                id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                                                <div class="offcanvas-header border-bottom">
                                                    <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">Add Event
                                                    </h5>
                                                    <button type="button" class="btn-close text-reset"
                                                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventTitle">Title</label>
                                                            <input type="text" class="form-control" id="eventTitle"
                                                                name="eventTitle" placeholder="Event Title" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventLabel">Label</label>
                                                            <select class="select2 select-event-label form-select"
                                                                id="eventLabel" name="eventLabel">
                                                                <option data-label="primary" value="Business" selected>
                                                                    Business</option>
                                                                <option data-label="danger" value="Personal">Personal
                                                                </option>
                                                                <option data-label="warning" value="Family">Family
                                                                </option>
                                                                <option data-label="success" value="Holiday">Holiday
                                                                </option>
                                                                <option data-label="info" value="ETC">ETC</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventStartDate">Start
                                                                Date</label>
                                                            <input type="text" class="form-control"
                                                                id="eventStartDate" name="eventStartDate"
                                                                placeholder="Start Date" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventEndDate">End Date</label>
                                                            <input type="text" class="form-control" id="eventEndDate"
                                                                name="eventEndDate" placeholder="End Date" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    class="switch-input allDay-switch" />
                                                                <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                                <span class="switch-label">All Day</span>
                                                            </label>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventURL">Event URL</label>
                                                            <input type="url" class="form-control" id="eventURL"
                                                                name="eventURL" placeholder="https://www.google.com" />
                                                        </div>
                                                        <div class="mb-3 select2-primary">
                                                            <label class="form-label" for="eventGuests">Add Guests</label>
                                                            <select class="select2 select-event-guests form-select"
                                                                id="eventGuests" name="eventGuests" multiple>
                                                                <option data-avatar="1.png" value="Jane Foster">Jane
                                                                    Foster
                                                                </option>
                                                                <option data-avatar="3.png" value="Donna Frank">Donna
                                                                    Frank
                                                                </option>
                                                                <option data-avatar="5.png" value="Gabrielle Robertson">
                                                                    Gabrielle Robertson
                                                                </option>
                                                                <option data-avatar="7.png" value="Lori Spears">Lori
                                                                    Spears
                                                                </option>
                                                                <option data-avatar="9.png" value="Sandy Vega">Sandy Vega
                                                                </option>
                                                                <option data-avatar="11.png" value="Cheryl May">Cheryl May
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventLocation">Location</label>
                                                            <input type="text" class="form-control" id="eventLocation"
                                                                name="eventLocation" placeholder="Enter Location" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="eventDescription">Description</label>
                                                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                                                        </div>
                                                        <div
                                                            class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                                            <div>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                                                                <button type="reset"
                                                                    class="btn btn-label-secondary btn-cancel me-sm-0 me-1"
                                                                    data-bs-dismiss="offcanvas">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                            <div><button
                                                                    class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Calendar & Modal -->
                                    </div>
                                </div>
                            </div>
                            </p>
                            <p class="mb-0">

                            </p>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-dashboard" role="tabpanel">
                            <p>
                            <div class="container-xxl flex-grow-1 container-p-y">

                                <!-- Card Border Shadow -->
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3 mb-4">
                                        <div class="card card-border-shadow-primary h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2 pb-1">
                                                    <div class="avatar me-2">
                                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                                class="bx bxs-truck"></i></span>
                                                    </div>
                                                    <h4 class="ms-1 mb-0">3</h4>
                                                </div>
                                                <p class="mb-1">Tareas Completadas</p>
                                                <p class="mb-0">
                                                    <span class="fw-medium me-1">18.2%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3 mb-4">
                                        <div class="card card-border-shadow-warning h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2 pb-1">
                                                    <div class="avatar me-2">
                                                        <span class="avatar-initial rounded bg-label-warning"><i
                                                                class="bx bx-error"></i></span>
                                                    </div>
                                                    <h4 class="ms-1 mb-0">2</h4>
                                                </div>
                                                <p class="mb-1">Tareas Incompletas</p>
                                                <p class="mb-0">
                                                    <span class="fw-medium me-1">8.7%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3 mb-4">
                                        <div class="card card-border-shadow-danger h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2 pb-1">
                                                    <div class="avatar me-2">
                                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                                class="bx bx-git-repo-forked"></i></span>
                                                    </div>
                                                    <h4 class="ms-1 mb-0">1</h4>
                                                </div>
                                                <p class="mb-1">Tareas atrasadas</p>
                                                <p class="mb-0">
                                                    <span class="fw-medium me-1">4.3%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3 mb-4">
                                        <div class="card card-border-shadow-info h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2 pb-1">
                                                    <div class="avatar me-2">
                                                        <span class="avatar-initial rounded bg-label-info"><i
                                                                class="bx bx-time-five"></i></span>
                                                    </div>
                                                    <h4 class="ms-1 mb-0">6</h4>
                                                </div>
                                                <p class="mb-1">Total de tareas</p>
                                                <p class="mb-0">
                                                    <span class="fw-medium me-1">2.5%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Card Border Shadow -->
                                <div class="row">
                                    <!-- Shipment statistics-->
                                    <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                                        <div class="card h-100">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="card-title mb-0">
                                                    <h5 class="m-0 me-2">Shipment statistics</h5>
                                                    <small class="text-muted">Total number of deliveries 23.8k</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-label-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        January
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="javascript:void(0);">January</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="javascript:void(0);">February</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">March</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">April</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">May</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">June</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">July</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">August</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="javascript:void(0);">September</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="javascript:void(0);">October</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="javascript:void(0);">November</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="javascript:void(0);">December</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="shipmentStatisticsChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Shipment statistics -->
                                    <!--/ Delivery Performance -->
                                    <!-- Reasons for delivery exceptions -->
                                    <div class="col-md-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                                        <div class="card h-100">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="card-title mb-0">
                                                    <h5 class="m-0 me-2">Reasons for delivery exceptions</h5>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="deliveryExceptions"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="deliveryExceptions">
                                                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="deliveryExceptionsChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Reasons for delivery exceptions -->
                                </div>
                                <!--/ On route vehicles Table -->
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('assets') }}/libs/fullcalendar/fullcalendar.js"></script>
    <script src="{{ url('assets') }}/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ url('assets') }}/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ url('assets') }}/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ url('assets') }}/libs/select2/select2.js"></script>
    <script src="{{ url('assets') }}/libs/apex-charts/apexcharts.js"></script>

    <script src="{{ url('assets') }}/js/app-calendar-events.js"></script>
    <script src="{{ url('assets') }}/js/app-calendar.js"></script>
    <script src="{{ url('assets') }}/js/tables-datatables-advanced.js"></script>
    <script src="{{ url('assets') }}/js/app-logistics-dashboard.js"></script>

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
