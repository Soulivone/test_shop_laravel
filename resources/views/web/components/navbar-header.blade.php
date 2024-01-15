<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        TEST SHOP
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
            <!-- Authentication Links -->
            @guest
            <li class="nav-item d-flex" style="padding: 0 8px">
                <a href="{{ route('cart') }}"
                    class="nav-link position-relative d-flex align-items-center border rounded-1">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="ms-3">{{ count(session('cart', [])) }}</span>
                </a>
            </li>

            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Đăng Nhập</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Đăng ký</a>
            </li>
            @endif
            @else
            <li class="nav-item d-flex" style="padding: 0 8px">
                <a href="{{ route('cart') }}"
                    class="nav-link position-relative d-flex align-items-center border rounded-1">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="ms-3">{{ count(session('cart', [])) }}</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>
