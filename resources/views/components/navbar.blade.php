<nav class="navbar navbar-expand-md navbar-light" style="min-height: 10rem;">
  <div class="container">
    <a class="fw-bold navbar-brand fs-2" href="{{ url('/') }}">
      myITSBooking
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav me-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto">
        <li class="px-4 border-2 fs-5 nav-item border-end">
          <a class="nav-link" href="/category/department">Departemen</a>
        </li>
        <li class="px-4 border-2 fs-5 nav-item border-end">
          <a class="nav-link" href="/category/sport">Olahraga</a>
        </li>
        <li class="px-4 border-2 fs-5 nav-item border-end">
          <a class="nav-link" href="/category/rapat">Rapat</a>
        </li>

        <!-- Authentication Links -->
        @if (!(auth()->guard('user')->check() || auth()->guard('admin')->check()))
          @if (!str_contains(url()->current(), "/admin/login"))
            @if (!(Route::current()->getName() == 'login' || Route::current()->getName() == 'admin.showloginform'))
            <li class="px-4 border-2 fs-5 nav-item fw-bolder">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            @if (Route::current()->getName() != 'register')
            <li class="px-4 border-2 fs-5 nav-item fw-bolder">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="px-4 fs-5 nav-link dropdown-toggle" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->guard('user')->check() ? auth()->guard('user')->user()->name : auth()->guard('admin')->user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/profil">
                {{ __('Profil') }}
              </a>
              <a class="dropdown-item" href="/riwayat">
                Riwayat
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Keluar') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
