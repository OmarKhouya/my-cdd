@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <section class="d-flex justify-content-center align-items-center py-5 text-dark"
        style="background-color: #6EF3D6;height: 77vh">
        <div class="container">
            <h1 class="text-center mb-3">Register</h1>
            @include('layouts.partials.register-form')
        </div>
    </section>

@endsection
