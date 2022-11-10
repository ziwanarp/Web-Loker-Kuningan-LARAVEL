<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('/storage/logo-images/lokerkuningan.png') }}" alt="lokerkuningan" width="100" height="35">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' :'' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts") ? 'active' :'' }}" href="/posts">Loker</a>
          </li>
            <li class="nav-item  dropdown">
              
              <a class="nav-link {{ (request('category')) ? 'active' :'' }}  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (request('category'))
                {{$lokasi}}
                @else
                Lokasi
                @endif
                
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href="/posts?category={{ $category->slug }}"><i class="bi bi-geo-alt-fill"></i> {{ $category->name }}</a></li>
                {{-- <li><hr class="dropdown-divider"></li> --}}
                @endforeach
              </ul>
            </li>
      </div>
      

        <ul class="navbar-nav ml-7">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selamat datang, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person-dash"></i> Dashboard Saya</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                    <button type="submit" class="dropdown-item" ><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' :'' }}"><i class="bi bi-box-arrow-in-right"></i>  Login</a>
          </li>
          @endauth
        </ul>

    </div>
  </nav>