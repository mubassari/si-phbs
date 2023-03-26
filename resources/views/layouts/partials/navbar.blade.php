<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @auth
        <li class="nav-item">
          <form action="{{ route('logout') }}" id="form-logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-default">Keluar</button>
          </form>
        </li>
      @else
        <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Masuk</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">Daftar</a>
        </li>
      @endauth
    </ul>
  </nav>