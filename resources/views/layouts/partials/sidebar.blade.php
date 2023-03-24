<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/dist/img/adminLTE/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI-PHBS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img style="width: 30px; height: 30px; object-fit: cover; object-position: center top" src=""
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Ramadhan</a>
                </div>
            </div>
        @endauth
        @php
            $sidebars = collect([['title' => 'Beranda', 'uri' => route('beranda'), 'icon' => 'home'], ['title' => 'User', 'uri' => route('user.index'), 'icon' => 'user'], ['title' => 'Indikator', 'uri' => route('indikator.index'), 'icon' => 'exclamation-circle'], ['title' => 'Survey', 'uri' => route('survey.index'), 'icon' => 'poll']]);
        @endphp
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @foreach ($sidebars->toArray() as $sidebar)
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ $sidebar['uri'] }}"
                            class="nav-link @if (url()->current() == $sidebar['uri']) active @endif">
                            <i class="nav-icon fas {{ 'fa-' . $sidebar['icon'] }}"></i>
                            <p>{{ $sidebar['title'] }}</p>
                        </a>
                    </li>
                </ul>
            @endforeach
        </nav>
    </div>
</aside>
