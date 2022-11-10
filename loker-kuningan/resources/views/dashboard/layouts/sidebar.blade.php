<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="layout" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="edit" class="align-text-bottom"></span>
            Loker Saya
          </a>
        </li>
      </ul>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> 
        <span>Menu Admin</span>
      </h6> 
      <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
          <span data-feather="map-pin" class="align-text-bottom"></span>
          Lokasi Loker
        </a>
      </li>
      </ul>
      <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" aria-current="page" href="/dashboard/users">
          <span data-feather="users" class="align-text-bottom"></span>
          Akun pengguna
        </a>
      </li>
      </ul>
      <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/home*') ? 'active' : '' }}" aria-current="page" href="/dashboard/home">
          <span data-feather="home" class="align-text-bottom"></span>
          Halaman Utama
        </a>
      </li>
      </ul>
      </ul>
      <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/allposts*') ? 'active' : '' }}" aria-current="page" href="/dashboard/allposts">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Semua Loker
        </a>
      </li>
      </ul>
      @endcan
    </div>
  </nav>