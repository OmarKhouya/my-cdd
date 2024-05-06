@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <section class="d-flex justify-content-center align-items-center py-5 text-dark"
        style="background-color: #6EF3D6;height: 78vh">
        <div class="container">
            <h1 class="text-center">Partner Login</h1>
            <div class="col-lg-6 m-auto">
                @if (Session::has('credentials'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-3"></i>
                        <strong>Error!</strong> {{ Session::get('credentials') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <form method="POST" action="{{ route('partner.login.store') }}" class="col-lg-6 m-auto">
                @csrf
                <div class="my-3">
                    <label for="Email" class="input-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus
                        autocomplete="username">
                </div>
                <div class="my-3">
                    <label for="Password" class="input-label">Password</label>
                    <input type="password" class="form-control" value="{{ old('password') }}" name="password" required
                        autocomplete="current-password">
                </div>
                <div class="my-3">
                    <label for="remember_me" class="input-label">Remember me</label>
                    <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                </div>
                <div class="mt-3">
                    {{-- @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif --}}
                    <button type="submit" class="btn btn-primary ms-3 float-end">Log in</button>
                </div>
            </form>
        </div>
    </section>
@endsection
