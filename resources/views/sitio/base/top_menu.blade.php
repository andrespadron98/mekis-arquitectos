<header id="desktop" class="header">
    <div class="container-fuild">
        <div class="name">
            <div class="logo-site"><img src="{{ asset('assets/images/logotype.png') }}" class="img" alt=""></div>
            <div class="name-site"><p>ANDRÉS MEKIS<br><small>ARQUITECTOS</small></p></div>
        </div>
        <div class="navbar invertido">
            <a class="btn-collapse-nav" href="#0"><span class="menu-icon"></span></a>
            <nav class="no-collapse-nav">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link {{ Request::is('proyectos*') ? 'active' : '' }}" href="{{ route('proyecto') }}">Proyectos <i class="bi bi-plus"></i></a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('construcciones*') ? 'active' : '' }}" href="{{ route('construcciones') }}">Construcciones</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('nosotros*') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('inspiracion*') ? 'active' : '' }}" href="{{ route('inspiracion') }}">Inspiración</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('prensa*') ? 'active' : '' }}" href="{{ route('prensa') }}">Prensa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <div class="title">
            <div class="no-collapse-title">
                <h2>{{ $valores['titulo'] }}</h2>
                <div class="detail-title"><img src="{{ asset('assets/images/detail-title-x.png') }}" class="img-fluid" alt=""></div>
            </div>
            <div class="collapse-title">
                <h2>{{ $valores['titulo'] }}</h2>
                <div class="detail-title"><img src="{{ asset('assets/images/detail-title-x.png') }}" class="img-fluid" alt=""></div>
            </div>
        </div>
    </div>
</header> 
<header id="mobile" class="header">
    <div class="container-fluid">
        <div class="name">
            <a class="btn-collapse-nav" href="#0"><span class="menu-icon"></span></a>
        </div>
        <div class="navbar">
            <nav class="collapse-nav is-visible">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link {{ Request::is('proyectos*') ? 'active' : '' }}" href="{{ route('proyecto') }}">Proyectos <i class="bi bi-plus"></i></a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('construcciones*') ? 'active' : '' }}" href="{{ route('construcciones') }}">Construcciones</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('nosotros*') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('inspiracion*') ? 'active' : '' }}" href="{{ route('inspiracion') }}">Inspiración</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('prensa*') ? 'active' : '' }}" href="{{ route('prensa') }}">Prensa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <div class="title">
            <div class="pt-5">
                <div class="name-site"><p>ANDRÉS MEKIS<br><small>ARQUITECTOS</small></p></div>
                <h2>{{ $valores['titulo'] }}</h2>
                <div class="d-flex justify-content-center">
                    <!-- <img src="{{ asset('assets/images/detail-title-y.png') }}" width="15%" class="pt-4" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</header>