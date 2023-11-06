<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <img width="90" src="{{ url('assets') }}/img/logo.png" class="img-fluid mx-auto" alt="Logo Dux Tracking" />
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    @php
        $menuData = [
            ['route' => 'admin.users.index', 'text' => 'Usuarios', 'tipoTab' => '', 'icon' => 'bx bx-bar-chart-alt-2'],
            ['route' => 'admin.dashboard.index', 'text' => 'Dashboards', 'tipoTab' => '', 'icon' => 'bx bxs-dashboard'],
            ['route' => 'admin.tasks.index', 'text' => 'Nuevos', 'tipoTab' => 'nuevos', 'icon' => 'bx bx-bar-chart-alt-2'],
            ['route' => 'admin.tasks.index', 'text' => 'Agendados', 'tipoTab' => 'agendados', 'icon' => 'bx bx-sort-alt-2'],
            ['route' => 'admin.tasks.index', 'text' => 'Reprogramados', 'tipoTab' => 'reprogramados', 'icon' => 'bx bx-cog'],
            ['route' => 'admin.tasks.index', 'text' => 'Rechazados', 'tipoTab' => 'rechazados', 'icon' => 'bx bx-shield-x'],
            ['route' => 'admin.import_salenew.index', 'text' => 'Importación', 'tipoTab' => '', 'icon' => 'bx bxs-file-import'],
            ['route' => 'admin.form_postsale.index', 'text' => 'Post Venta', 'tipoTab' => '', 'icon' => 'bx bxs-user-detail'],

            // ['route' => 'admin.form_backoffice.index', 'text' => 'Post Venta', 'tipoTab' => '', 'icon' => 'bx bxs-user-detail'],

        ];

        $menuItems = [];

        foreach ($menuData as $item) {
            $isActive = request()->routeIs($item['route']) && (isset($item['tipoTab']) ? request('tipoTab') == $item['tipoTab'] : true);

            $menuItems[] = [
                'route' => $item['route'],
                'text' => $item['text'],
                'isActive' => $isActive,
                'icon' => $item['icon'],
                'tipoTab' => $item['tipoTab'],
            ];
        }
    @endphp

    <ul class="menu-inner py-1">
        @foreach ($menuItems as $menuItem)
            @can($menuItem['route'])
            <li class="menu-item {{ $menuItem['isActive'] ? 'active open' : '' }}">
                <a href="{{ isset($menuItem['tipoTab']) && $menuItem['tipoTab'] !== '' ? route($menuItem['route'], ['tipoTab' => $menuItem['tipoTab']]) : route($menuItem['route']) }}"
                    class="menu-link text-center">
                    <div class="menu-icon-large">
                        <i class="menu-icon tf-icons {{ $menuItem['icon'] }} fa-2x"></i>
                    </div>
                    <div class="text-truncate" data-i18n="{{ $menuItem['text'] }}">{{ $menuItem['text'] }}</div>
                </a>
            </li>
            @endcan

        @endforeach
    </ul>



    {{-- <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('admin.users.index') ? 'active open' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="menu-link text-center">
                <div class="menu-icon-large">
                    <i class="menu-icon tf-icons bx bx-bar-chart-alt-2 fa-2x"></i>
                </div>
                <div class="text-truncate" data-i18n="Usuarios">Usuarios</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link text-center">
                <div class="menu-icon-large">
                    <i class="menu-icon tf-icons bx bxs-dashboard fa-2x"></i>
                </div>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.tasks.index', ['tipoTab' => 'nuevos']) }}" class="menu-link text-center">
                <div class="menu-icon-large">
                    <i class="menu-icon tf-icons bx bx-bar-chart-alt-2 fa-2x"></i>
                </div>
                <div class="text-truncate" data-i18n="Nuevos">Nuevos</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.tasks.index', ['tipoTab' => 'agendados']) }}" class="menu-link text-center">
                <div class="menu-icon-large">
                    <i class="menu-icon tf-icons bx bx-sort-alt-2 fa-2x"></i>
                </div>
                <div class="text-truncate" data-i18n="Agendados">Agendados</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.tasks.index', ['tipoTab' => 'reprogramados']) }}" class="menu-link text-center">
                <div class="menu-icon-large">
                    <i class="menu-icon tf-icons bx bx-cog fa-2x"></i>
                </div>
                <div class="text-truncate" data-i18n="Reprogramados">Reprogramados</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.tasks.index', ['tipoTab' => 'rechazados']) }}" class="menu-link text-center">
                <div class="menu-icon-large">
                    <i class="menu-icon tf-icons bx bx-shield-x fa-2x"></i>
                </div>
                <div class="text-truncate" data-i18n="Rechazados">Rechazados</div>
            </a>
        </li>
    </ul> --}}
</aside>
