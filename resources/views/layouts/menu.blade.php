{{-- <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li> --}}


<li class="side-menus {{ Request::is('proyectosPortal*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('proyectosPortal.index') }}"><i class="fas fa-building"></i><span>Proyectos</span></a>
</li>

<li class="side-menus {{ Request::is('tiposProyectos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tiposProyectos.index') }}"><i class="fas fa-building"></i><span>Tipos Proyectos</span></a>
</li>

<li class="side-menus {{ Request::is('categorias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categorias.index') }}"><i class="fas fa-bars"></i><span>Categorias</span></a>
</li>

<li class="side-menus {{ Request::is('contactos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contactos.index') }}"><i class="fas fa-phone"></i><span>Contactos</span></a>
</li>

<li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>Usuarios</span></a>
</li>

<li class="side-menus {{ Request::is('configuraciones*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('configuraciones.index') }}"><i class="fas fa-cogs"></i><span>Configuraciones</span></a>
</li>


