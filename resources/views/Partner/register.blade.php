@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <section class="d-flex justify-content-center align-items-center py-5 text-dark"
        style="background-color: #6EF3D6;height: 77vh">
        <div class="container">
            <h1 class="text-center mb-3">Partner Register</h1>
            <form method="POST" action="{{ route('partner.register.store') }}" class="col-10 m-auto">
                @csrf
                <!-- Name -->
                <div class="row d-flex justify-content-between">
                    <div class="col-md-6">
                        <label for="name" class="input-label text-muted">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required
                            autocomplete="name">
                        @if ($errors->has('name'))
                            <ul class="">
                                @foreach ($errors->get('name') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- category Address -->
                    <div class="col-md-6">
                        <label for="category" class="input-label text-muted">category</label>
                        <input type="text" class="form-control" name="category" value="{{ old('category') }}" required
                            autocomplete="category">
                        @if ($errors->has('category'))
                            <ul class="bg-danger">
                                @foreach ($errors->get('category') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <!-- Email Address -->
                    <div class="col-md-6">
                        <label for="Email" class="input-label text-muted">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required
                            autocomplete="username">
                        @if ($errors->has('email'))
                            <ul class="bg-danger">
                                @foreach ($errors->get('email') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- size Address -->
                    <div class="col-md-6">
                        <label for="size" class="input-label text-muted">size</label>
                        <input type="text" class="form-control" name="size" value="{{ old('size') }}" required
                            autocomplete="size">
                        @if ($errors->has('size'))
                            <ul class="bg-danger">
                                @foreach ($errors->get('size') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
                <!-- Password -->
                <div>
                    <label for="Password" class="input-label  text-muted">Password</label>
                    <input type="password" class="form-control" name="password" required autocomplete="password">
                    @if ($errors->has('password'))
                        <ul class="bg-danger mt-3">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="input-label text-muted">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                    @if ($errors->has('password'))
                        <ul class="bg-danger">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('login') }}" class="ms-3">Already registered?</a>
                    <button class="btn btn-primary ms-3">Register</button>
                </div>
            </form>
        </div>
    </section>
@endsection
