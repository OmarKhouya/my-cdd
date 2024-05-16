<nav class="navbar navbar-expand-lg sticky-top top-0" style="background-color: #6EF3D6">
    <div class="container pt-2">
        <a class="navbar-brand" href="/">my CDD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                @if (Auth::check() || Auth::guard('partner')->check())
                    @if (Auth::guard('partner')->check())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('partner.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partner.offers') }}">Offers</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('member.offers') }}">Offers</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#Advantages">Why us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#AboutUs">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#Plans">Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#Contact">Contact</a>
                    </li>
                @endguest
        </ul>
        @if (Auth::check() || Auth::guard('partner')->check())
            <div class="d-flex justify-content-between">
                <a href="{{ Auth::guard('partner')->check() ? route('partner.profile.edit') : route('profile.edit') }}"
                    class="d-flex text-decoration-none text-dark me-2">
                    <div class="my-auto pt-1">
                        <i class="fa-regular fa-circle-user fs-4"></i>
                    </div>
                    <div class="my-auto ms-2">
                        @if (Auth::guard('partner')->check())
                            <span>{{ Auth::guard('partner')->user()->name }}</span>
                        @else
                            <span>{{ Auth::user()->name }}</span>
                        @endif
                    </div>
                </a>
                <div class="vr mx-2"></div>
                <div class="my-auto pt-1 ms-2">
                    <form method="POST"
                        action="{{ Auth::guard('partner')->check() ? route('partner.logout') : route('logout') }}">
                        @csrf

                        <button type="submit" class="nav-link text-dark">
                            <span class=" d-flex flex-column text-center">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <span>Logout</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="dropdown">
                <button class="nav-link text-dark d-flex flex-column align-items-center" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-right-to-bracket"></i> <span>Login</span>
                </button>

                <ul class="dropdown-menu" style="background-color: #6EF3D6">
                    <li>
                        <a class="text-dark dropdown-item" href="{{ route('login') }}">
                           <span>as a member</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-dark dropdown-item" href="{{ route('partner.login')  }}">
                           <span>as a partner</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-between">

                <div class="vr mx-2"></div>
                <div class="dropdown">
                    <button class="nav-link text-dark me-3 d-flex flex-column align-items-center" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-plus"></i> <span>Register</span>
                    </button>

                    <ul class="dropdown-menu" style="background-color: #6EF3D6">
                        <li>
                            <a class="text-dark dropdown-item" href="{{  route('register') }}">
                               <span>as a member</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark dropdown-item" href="{{ route('partner.register')  }}">
                               <span>as a partner</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
</nav>
