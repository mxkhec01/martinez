<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            <img src="/img/Logo.png" class="mx-auto d-block" style="max-width: 90%; max-height: 90%;">
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('catalogo_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.catalogo.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('menu_cliente_access')
                                                @can('cliente_access')
                                    <li class="c-sidebar-nav-item ml-4">
                                        <a href="{{ route("admin.clientes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clientes") || request()->is("admin/clientes/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                            </i>
                                            Clientes
                                        </a>
                                    </li>
                                @endcan
                            {{-- </ul>
                        </li> --}}
                    @endcan
                    @can('menu_operadore_access')
                                @can('operador_access')
                                    <li class="c-sidebar-nav-item ml-4">
                                        <a href="{{ route("admin.operadors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/operadors") || request()->is("admin/operadors/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-id-card c-sidebar-nav-icon">
                                            </i>
                                            Operadores
                                        </a>
                                    </li>
                                @endcan
                                {{-- @can('ver_operadore_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.ver-operadores.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ver-operadores") || request()->is("admin/ver-operadores/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-eye c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.verOperadore.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li> --}}
                    @endcan
                    @can('menu_unidade_access')
                        {{-- <li class="c-sidebar-nav-dropdown {{ request()->is("admin/unidads*") ? "c-show" : "" }} {{ request()->is("admin/agregar-unidades*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.menuUnidade.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items"> --}}
                                @can('unidad_access')
                                    <li class="c-sidebar-nav-item ml-4">
                                        <a href="{{ route("admin.unidads.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/unidads") || request()->is("admin/unidads/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                                            </i>
                                            Unidades
                                        </a>
                                    </li>
                                @endcan
                    @endcan
                </ul>
            </li>
        @endcan
        @can('viaje_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.viajes.mostrar',['valor' => 'activo']) }}" class="c-sidebar-nav-link {{ request()->is("admin/viajes") || request()->is("admin/viajes/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-plane c-sidebar-nav-icon">

                    </i>
                    Viajes
                </a>
            </li>
        @endcan
        @can('factura_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.control.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/control") || request()->is("admin/controls/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-broadcast-tower c-sidebar-nav-icon"></i>
                    Torre de Control
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
