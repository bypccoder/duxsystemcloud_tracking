<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | Dux</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- My Style -->
    <link rel="stylesheet" href="{{ url('assets') }}/css/my-style.css" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets') }}/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/flatpickr/flatpickr.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('assets') }}/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ url('assets') }}/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets') }}/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('admin.partials.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('admin.partials.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 order-1">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Reprogramados</span>
                                                <h3 class="card-title text-nowrap mb-1">2300</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Agendados</span>
                                                <h3 class="card-title text-nowrap mb-1">10500</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ url('assets') }}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Rechazados</span>
                                                <h3 class="card-title text-nowrap mb-1">15300</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <h6 class="text-muted">Filled Pills</h6>
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#navs-pills-justified-nuevos"
                                                aria-controls="navs-pills-justified-home" aria-selected="true">
                                                <i class="tf-icons bx bx-bar-chart-alt-2 fa-2x me-1"></i> Nuevos
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-pills-justified-agendados"
                                                aria-controls="navs-pills-justified-profile" aria-selected="false">
                                                <i class="tf-icons  bx bx-sort-alt-2 fa-2x me-1"></i> Agendados
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#navs-pills-justified-reprogramacion"
                                                aria-controls="navs-pills-justified-messages" aria-selected="false">
                                                <i class="tf-icons bx bx-cog fa-2x me-1"></i> Reprogramación
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#navs-pills-justified-rechazados"
                                                aria-controls="navs-pills-justified-messages" aria-selected="false">
                                                <i class="tf-icons bx bx-shield-x fa-2x me-1"></i> Rechazados
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-pills-justified-nuevos"
                                            role="tabpanel">
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
                                                                                data-column="5"
                                                                                placeholder="StartDate to EndDate"
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
                                                                        <input type="text"
                                                                            class="form-control dt-input dt-full-name"
                                                                            data-column="1"
                                                                            placeholder="Alaric Beslier"
                                                                            data-column-index="0" />
                                                                    </div>
                                                                    <div class="col-4 col-sm-6 col-lg-4">
                                                                        <label class="form-label">Motorizado:</label>
                                                                        <input type="text"
                                                                            class="form-control dt-input"
                                                                            data-column="2"
                                                                            placeholder="demo@example.com"
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
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Post</th>
                                                                <th>City</th>
                                                                <th>Date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Post</th>
                                                                <th>City</th>
                                                                <th>Date</th>
                                                                <th>Salary</th>
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
                                        <div class="tab-pane fade" id="navs-pills-justified-reprogramacion"
                                            role="tabpanel">
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
                                        <div class="tab-pane fade" id="navs-pills-justified-rechazados"
                                            role="tabpanel">
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
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('admin.partials.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ url('assets') }}/libs/jquery/jquery.js"></script>
    <script src="{{ url('assets') }}/libs/popper/popper.js"></script>
    <script src="{{ url('assets') }}/js/bootstrap.js"></script>
    <script src="{{ url('assets') }}/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('assets') }}/libs/hammer/hammer.js"></script>
    <script src="{{ url('assets') }}/libs/i18n/i18n.js"></script>
    <script src="{{ url('assets') }}/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ url('assets') }}/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ url('assets') }}/libs/datatables-bs5/datatables-bootstrap5.js"></script>

     <!-- Flat Picker -->
     <script src="{{ url('assets') }}/vendor/libs/moment/moment.js"></script>
     <script src="{{ url('assets') }}/libs/flatpickr/flatpickr.js"></script>

    <!-- Main JS -->
    <script src="{{ url('assets') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ url('assets') }}/js/dashboards-analytics.js"></script>
    <script src="{{ url('assets') }}/js/tables-datatables-advanced.js"></script>
    <script>
        var dt_adv_filter_table = $('#tbl_Nuevos')
        var dt_adv_filter = dt_adv_filter_table.DataTable({
      dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'p>>",
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: '' },
        { data: 'full_name' },
        { data: 'email' },
        { data: 'post' },
        { data: 'city' },
        { data: 'start_date' },
        { data: 'salary' }
      ],

      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        }
      ],
      orderCellsTop: true,
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
    </script>
</body>

</html>
