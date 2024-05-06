@extends('layouts.master')
@section('title', 'Partner')

@section('content')
    <section class="py-5 text-dark" style="background-color: #6EF3D6;">
        <div class="container">
            <h1 class="text-start mb-3">Welcome back,<br> {{Auth::guard('partner')->user()->name}}</h1>
            <hr class="w-25">
            <div class="">
                
            </div>
        </div>
    </section>
    @endsection
