<header id="desktop" class="header index-sec">
    <div class="container-fluid">
        <div class="name">
            <div class="logo-site">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/images/logotype.png') }}" class="img" alt="">
                </a>
            </div>
            <div class="name-site">
                <a href="{{ route('index') }}">
                    <p>ANDRÉS MEKIS<br><small>ARQUITECTOS</small></p>
                </a>
            </div>
        </div>
        <div class="navbar">
            <a class="btn-collapse-nav" id="btn-collapse-nav" href="#0"><span class="menu-icon"></span></a>
            <nav class="collapse-nav is-visible">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link {{ Request::is('proyectos*') ? 'active' : '' }}" href="{{ route('proyecto') }}">Proyectos <i class="bi bi-plus"></i></a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('construcciones*') ? 'active' : '' }}" href="{{ route('construcciones') }}">Construcciones</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('nosotros*') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('inspiracion*') ? 'active' : '' }}" href="{{ route('inspiracion') }}">Inspiración</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('prensa*') ? 'active' : '' }}" href="{{ route('prensa') }}">Prensa</a></li>
                    <li class="nav-item"><a class="nav-link" href="mailto:{{ $valores[5] }}">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <div class="title">
            <div class="no-collapse-title is-visible">
                <h2>ARQUITECTURA<br>&<br>CONSTRUCCION</h2>
                <div class="detail-title"><img src="assets/images/detail-title-x.png" class="img-fluid" alt=""></div>
            </div>
            <div class="collapse-title is-visible">
                <h2>ARQUITECTURA & CONSTRUCCION</h2>
                <div class="detail-title"><img src="assets/images/detail-title-x.png" class="img-fluid" alt=""></div>
            </div>
        </div>
    </div>
</header> 
<header id="mobile" class="header index-sec">
    <div class="container-fluid">
        <div class="name">
            <a class="btn-collapse-nav" id="btn-collapse-nav" href="#0"><span class="menu-icon"></span></a>
            <div class="name-site"><p>ANDRÉS MEKIS<br><small>ARQUITECTOS</small></p></div>
        </div>
        <div class="navbar">
            <nav class="collapse-nav is-visible nav-index">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link {{ Request::is('proyectos*') ? 'active' : '' }}" href="{{ route('proyecto') }}">Proyectos <i class="bi bi-plus"></i></a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('construcciones*') ? 'active' : '' }}" href="{{ route('construcciones') }}">Construcciones</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('nosotros*') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('inspiracion*') ? 'active' : '' }}" href="{{ route('inspiracion') }}">Inspiración</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('prensa*') ? 'active' : '' }}" href="{{ route('prensa') }}">Prensa</a></li>
                    <li class="nav-item"><a class="nav-link" href="mailto:{{ $valores[5] }}">Contacto</a></li>
                </ul>
            </nav>
        </div>
        <div class="title">
            <div class="no-collapse-title is-visible">
                <div class="logo-site">
                    <a href="{{ route('index') }}">
                        <img src="assets/images/logotype.png" alt="">
                    </a>
                </div>
                <h2>ARQUITECTURA<br>&<br>CONSTRUCCION</h2>
                <div class="d-flex justify-content-center">
                    <img src="assets/images/detail-title-y.png" width="15%" class="pt-4" alt="">
                </div>
            </div>
        </div>
    </div>
</header>