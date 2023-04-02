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
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->nama }} {!! auth()->user()->icon_status_verifikasi !!}</a>
                </div>
            </div>
        @endauth
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('beranda') }}"
                        class="nav-link {{ Route::currentRouteName('beranda') == 'beranda' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
            </ul>
            @auth
                @if (auth()->user()->is_admin)
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('indikator.index') }}"
                                class="nav-link {{ Request::is('indikator*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-industry"></i>
                                <p>Indikator</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('survey.index') }}"
                                class="nav-link {{ Request::is('survey*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-bullhorn"></i>
                                <p>Survey</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('tinjauan.index') }}"
                                class="nav-link {{ Request::is('tinjauan') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>Tinjauan</p>
                            </a>
                        </li>
                    </ul>
                @endif

                @if (\App\Models\Survey::count() > 0)
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            @if (auth()->user()->status_draft)
                                <a href="{{ route('survey.isi') }}"
                                    class="nav-link {{ Request::is('survey/isi') ? 'active' : '' }}">
                                    <i class="nav-icon fa fa-edit"></i>
                                    <p>Isi Survey</p>
                                </a>
                            @else
                                <a href="{{ route('survey.saya') }}"
                                    class="nav-link {{ Request::is('survey/saya') ? 'active' : '' }}">
                                    <i class="nav-icon fa fa-edit"></i>
                                    <p>Survey Saya</p>
                                </a>
                            @endif
                        </li>
                    </ul>
                @endif
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link {{ Request::is('profil') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>Lihat Profil</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('password') }}"
                            class="nav-link {{ Request::is('kata-sandi') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>Kata Sandi</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false"
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="nav-icon fa fa-arrow-circle-left"></i>
                            <p>Keluar</p>
                        </a>
                    </li>
                </ul>
            @endauth
            @guest
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ Request::is('masuk') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-arrow-circle-right"></i>
                            <p>Masuk</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link {{ Request::is('daftar') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cube"></i>
                            <p>Daftar</p>
                        </a>
                    </li>
                </ul>
            @endguest
        </nav>
    </div>
</aside>
