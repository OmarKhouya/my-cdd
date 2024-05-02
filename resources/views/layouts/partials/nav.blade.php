<nav class="navbar navbar-expand-lg sticky-top top-0" style="background-color: #6EF3D6">
    <div class="container pt-2">
        <a class="navbar-brand" href="/">my CDD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Advantages">Why us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#AboutUs">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Plans">Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Contact">Contact</a>
                </li>
            </ul>
            @Auth
                <div class="d-flex justify-content-between">
                    <a href="{{ route('profile.edit') }}" class="d-flex text-decoration-none text-dark me-2">
                        <div class="my-auto pt-1">
                            <i class="fa-regular fa-circle-user fs-4"></i>
                        </div>
                        <div class="my-auto ms-2">
                           <span>{{ Auth::user()->name }}</span>
                        </div>
                    </a>
                    <div class="vr"></div>
                    <div class="my-auto pt-1 ms-2">
                        <form method="POST" action="{{ route('logout') }}">
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
                <div class="d-flex justify-content-between">
                    <a class="nav-link text-dark me-3 d-flex flex-column" href="{{ route('login') }}">
                        <i class="fa-solid fa-right-to-bracket"></i> <span>Login</span>
                    </a>
                    <div class="vr"></div>
                    <a class="nav-link text-dark ms-3 d-flex flex-column" href="{{ route('register') }}">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
