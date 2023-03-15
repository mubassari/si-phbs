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
          <button type="button" class="btn btn-default">Keluar</button>
          <form action="#" class="d-none" id="form-keluar" method="POST">
            @csrf
          </form>
        </li>
      @else
        <li class="nav-item">
            <a href="#" class="nav-link">Masuk</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Daftar</a>
        </li>
      @endauth
    </ul>
  </nav>