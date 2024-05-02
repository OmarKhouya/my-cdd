@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <section id="Home" class="py-5 text-dark" style="background-color: #6EF3D6">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <h1 class="" style="font-size: 5rem;">Boost Your Business <br>
                        with New Offers!</h1>
                    <br>
                    <p class="text-muted fs-4">
                        Welcome to My CDD, your exclusive hub for connecting with fellow business leaders and unlocking
                        valuable resources to propel your success!
                    </p>
                </div>
                <div class="col-md-6 d-md-inline d-none">
                    <img src="{{ asset('images/boost.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="Advantages" class="py-5 text-dark" style="background-color: #C6FCE5;">
        <div class="container mt-5">
            <div class="mb-3">
                <h1 class="text-center">
                    Advantage of using our platforme
                </h1>
                <p class="text-center text-muted">
                    Unlock a Network of Powerful Connections with My CDD
                </p>
            </div>
            <div class="row py-5">
                <div class="col-md-4 d-flex justify-content-center flex-column align-items-center">
                    <div class="p-4 rounded text-dark mb-3"
                        style="width: fit-content!important;border:1px solid dark;background-color: #6EF3D6;">
                        <i class="fa-solid fa-arrow-up-right-dots fs-1 w-100"></i>
                    </div>
                    <h3 class="mt-2">
                        Empower Your Success
                    </h3>
                    <p class="text-muted text-center">
                        My CDD isn't just a platform, it's your gateway to a vibrant community of successful business
                        leaders. Connect with like-minded individuals, build lasting partnerships, and discover valuable
                        collaborations that fuel your growth.
                    </p>
                </div>
                <div class="col-md-4 d-flex justify-content-center flex-column align-items-center">
                    <div class="p-4 rounded text-dark mb-3"
                        style="width: fit-content!important;border:1px solid dark;background-color: #6EF3D6;">
                        <i class="fa-solid fa-globe fs-1 w-100"></i>
                    </div>
                    <h3 class="mt-2">
                        Fuel Business Growth
                    </h3>
                    <p class="text-muted text-center">
                        My CDD places a wealth of resources at your fingertips. Access exclusive industry insights,
                        educational workshops, and mentorship opportunities designed to empower your strategic
                        decision-making and propel your business forward.
                    </p>
                </div>
                <div class="col-md-4 d-flex justify-content-center flex-column align-items-center">
                    <div class="p-4 rounded text-dark mb-3"
                        style="width: fit-content!important;border:1px solid dark;background-color: #6EF3D6;">
                        <i class="fa-brands fa-buromobelexperte fs-1 w-100"></i>
                    </div>
                    <h3 class="mt-2">
                        Simplify Your Experience
                    </h3>
                    <p class="text-muted text-center">
                        My CDD streamlines member management, making your participation in Club Des Dirigeants effortless.
                        Enjoy convenient access to your membership information, upcoming events, and exclusive benefits, all
                        within a user-friendly and intuitive platform.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="AboutUs" class="py-5 text-dark" style="background-color: #EBFFFA;">
        <div class="container mt-5">
            <div class=" py-3 row d-flex justify-content-center">
                <div class="col-md-6 d-md-inline d-none">
                    <img src="{{ asset('images/about.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-4">
                    <h1>About us</h1>
                    <p class="text-muted fs-5 mt-3">
                        Club Des Dirigeants (CDD) is a dynamic organization fostering a thriving community of accomplished
                        business leaders. We empower our members to achieve their professional aspirations and contribute to
                        the collective success of the business landscape.
                    </p>
                    <p class="fw-bold fs-3">Our Mission</p>
                    <div class="fs-5 ms-4">
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Connection</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Empowerment</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Growth</span></p>
                    </div>
                    <div class="d-flex justify-content-around pt-3">
                        <p class="d-flex flex-column text-center">10,000+ <span> members</span></p>
                        <div class="vr"></div>
                        <p class="d-flex flex-column text-center">12,000+ <span> offers</span></p>
                        <div class="vr"></div>
                        <p class="d-flex flex-column text-center">6,000+ <span> partners</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Plans" class="py-5 text-dark" style="background-color: #C6FCE5;">
        <div class="container mt-5">
            <div>
                <h1 class="text-center">Plans</h1>
                <p class="text-muted text-center">Find Your Perfect Fit</p>
            </div>
            <div class="row d-flex justify-content-evenly py-5">
                <div class="col-md-4 mb-3 p-4 shadow-lg"
                    style="background-color: #EBFFFA!important;width: 16rem;border:1px solid #EBFFFA;border-radius: 50px">
                    <h4 class="text-center mt-3">Member</h4>
                    <p class="text-muted text-center ">Gain access to the core benefits of My CDD</p>
                    <div class="py-3">
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Build Your Foundation</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Connect & Collaborate</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Stay Informed</span></p>
                    </div>
                </div>
                <div class="col-md-4 mb-3 p-4 shadow-lg"
                    style="width: 16rem;background-color: #EBFFFA!important;width: 16rem;border:1px solid #EBFFFA;border-radius: 50px">
                    <h4 class="text-center mt-3">Privilege</h4>
                    <p class="text-muted text-center">Take your membership to the next level</p>
                    <div class="py-3">
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Elevate Your Experience</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Sharpen Your Skills</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Maximize Your Visibility</span></p>
                    </div>
                </div>
                <div class="col-md-4 mb-3 p-4 shadow-lg"
                    style="width: 16rem;background-color: #EBFFFA!important;width: 16rem;border:1px solid #EBFFFA;border-radius: 50px">
                    <h4 class="text-center mt-3">VIP</h4>
                    <p class="text-muted text-center ">Become a true leader within the CDD community with</p>
                    <div class="py-3">
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Executive Networking Events</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Shape the Future</span></p>
                        <p><i class="fa-solid fa-check px-2  text-success"></i><span>Elevate Your Brand</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Contact" class="py-5 text-dark" style="background-color: #EBFFFA;">
        <div class="container">
            <div class="text-center mt-3 mb-2">
                <h1>Get in Touch</h1>
                <p class="text-muted">Start your journey to success.</p>
            </div>
            <div class="row d-flex">
                <div class="col-md-7 d-md-inline d-none my-auto border-end border-2 ">
                    <div class="col-md-10 m-auto">
                        <h2 class="mb-3">Create your account now</h2></div>
                    @include('layouts.partials.register-form')
                </div>
                <div class="ms-2 col-md-4">
                    <h1 class="">Contact Info</h1>
                    <div class="text-muted ms-4 mt-3">
                        <p><i class="fa-solid fa-location-dot me-3"></i> 123 Street, Safi, Morocco</p>
                        <p><i class="fa-solid fa-phone me-3"></i> +212 6 00 00 00 00</p>
                        <p><i class="fa-solid fa-phone me-3"></i> +212 6 20 02 30 03</p>
                        <p><i class="fa-solid fa-envelope me-3"></i> mycdd@contact.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
