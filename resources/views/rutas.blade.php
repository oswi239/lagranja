<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Add icons to the links using the .nav-icon class

         with font-awesome or any other icon font library -->
    <li class="nav-item {{ request()->is('clientes') || request()->is('usuarios') || request()->is('empresa') ? 'menu-open' : '' }}    ">
        <a href="#" class="nav-link {{ request()->is('clientes') || request()->is('usuarios') || request()->is('empresa') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                OPERADORES
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('usuarios') }}" class="nav-link {{request()->is('usuarios') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('clientes') }}" class="nav-link {{ request()->is('clientes') ? 'active' : '' }}">
                    <i class="fas fa-user-tie nav-icon"></i>
                    <p>Clientes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('empresa') }}" class="nav-link {{ request()->is('empresa') ? 'active' : '' }}">
                    <i class="fas fa-user-tie nav-icon"></i>
                    <p>Empresa</p>
                </a>
            </li>

        </ul>
    </li>
    <li class="nav-item {{ request()->is('compras') || request()->is('comprafija')  || request()->is('productos') ? 'menu-open' : '' }}    ">
        <a href="#" class="nav-link {{ request()->is('compras') || request()->is('comprafija')  || request()->is('productos') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                COMPRAS
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('productos') }}" class="nav-link {{request()->is('productos') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Registrar Producto</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('comprafija') }}" class="nav-link {{request()->is('comprafija') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>compra fija</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('compras') }}" class="nav-link {{ request()->is('compras') ? 'active' : '' }}">
                    <i class="fas fa-user-tie nav-icon"></i>
                    <p>Registrar Compra</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('empresa') }}" class="nav-link {{ request()->is('empresa') ? 'active' : '' }}">
            <i class="fas fa-user-tie nav-icon"></i>
            <p>Empresa</p>
            </a>
    </li> --}}

</ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Widgets
            <span class="right badge badge-danger">New</span>
        </p>
    </a>
</li>


</ul>
