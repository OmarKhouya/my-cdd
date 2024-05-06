@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    <section class="d-flex justify-content-center align-items-center py-5 text-dark"
        style="background-color: #6EF3D6;height: 77vh">
        <div class="container">
            <h1 class="text-center mb-3">Partner Profile</h1>
            <form method="POST" action="{{ route('partner.profile.update') }}" class="col-10 m-auto">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div class="row d-flex justify-content-between">
                    <div class="col-md-6">
                        <label for="name" class="input-label text-muted">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', Auth::guard('partner')->user()->name) }}" required
                            autocomplete="name">
                        @if ($errors->has('name'))
                            <ul class="">
                                @foreach ($errors->get('name') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach                 
