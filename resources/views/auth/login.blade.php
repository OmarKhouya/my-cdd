@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <section class="d-flex justify-content-center align-items-center py-5 text-dark" style="background-color: #6EF3D6;height: 77vh">
        <div class="container">
            <h1 class="text-center">Login <a href="{{route('partner.login')}}" class="text-dark">As a partner</a></h1>

            <form method="POST" action="{{ route('login') }}" class="col-lg-6 m-auto">
                @csrf
                <div class="my-3">
                    <label for="Email" class="input-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus
                        autocomplete="username">
                    @if ($errors->has('email'))
                        <ul class="bg-danger">
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="my-3">
                    <label for="Password" class="input-label">Password</label>
                    <input type="password" class="form-control" value="{{ old('password') }}" name="password" required
                        autocomplete="current-password">
                    @if ($errors->has('password'))
                        <ul class="bg-danger">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="my-3">
                    <label for="remember_me" class="input-label">Remember me</label>
                    <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                    @if ($errors->has('remember'))
                        <ul class="bg-danger">
                            @foreach ($errors->get('remember') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="d-flex justify-content-between mt-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif

                    <button type="submit" class="btn btn-primary ms-3">Log in</button>
                </div>
            </form>
        </div>
    </section>
@endsection
