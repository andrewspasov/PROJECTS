<header class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="blog">
                <a class="navbar-brand font-weight-bold text-light" href="{{ url('/') }}">Blog</a>
            </div>

            <div class="collapse navbar-collapse text-light" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
                    </li>
                    <li class="nav-item {{ Request::is('post*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('post') }}">SAMPLE POST</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>