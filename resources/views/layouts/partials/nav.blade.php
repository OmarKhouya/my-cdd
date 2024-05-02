<nav class="navbar navbar-expand-lg" style="background-color: #9AC5F4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">my cdd</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Link</a>
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
                    <a class="nav-link text-dark me-2 d-flex flex-column" href="{{ route('login') }}">
                        <i class="fa-solid fa-right-to-bracket"></i> <span>Login</span>
                    </a>
                    <a class="nav-link text-dark ms-2 d-flex flex-column" href="{{ route('register') }}">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
