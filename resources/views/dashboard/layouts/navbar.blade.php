<nav class="navbar navbar-expand-lg navbar-light bg-white shadow navbar-user">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">RTIK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Anggota RTIK
            </a>
            <div class="dropdown-menu">
                @foreach ($status as $row)
                <a class="dropdown-item" href="/anggota/{{ $row->id }}">{{ $row->status }}</a>
                @endforeach
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Artikel
            </a>
            <div class="dropdown-menu">
                @foreach ($kategori as $row)
                <a class="dropdown-item" href="/artikel/{{ $row->id }}">{{ $row->kategori }}</a>
                @endforeach
            </div>
          </li>
          @guest()
              <a class="nav-link text-dark " aria-current="page" href="/daftar"><b>Daftar</b></a>
          @endguest
          @guest()
              <a class="nav-link text-dark " aria-current="page" href="/login"><b>Login</b></a>
          @endguest
          @auth()
            <a class="nav-link text-dark" aria-current="page" href="/logout"><b>Logout</b></a>
            <a class="nav-link text-dark" aria-current="page" href="/dashboard/anggota"><b>Kembali ke Dashboard</b></a>
          @endauth
        </div>
      </div>
    </div>
  </nav>
