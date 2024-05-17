@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <section class="py-5 text-dark" style="background-color: #6EF3D6">
        <div class="container">
            <h1 class="text-center">Profile</h1>
            <div class="my-3">
                <div class="container-fluid ">
                    <div>
                        <section>
                            <div>
                                <h2 class="">
                                    Linkings inforamtions
                                </h2>
                                <p class="text-muted">here you can accept or deny linking requests</p>
                                <div>
                                    @foreach ($links as $link)
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $link-> }}</h5>
                                                <p class="card-text text-muted">{{ $link->email }}</p>
                                                <p class="text-muted">{{ $link->category }}</p>
                                                <a href="{{ route('profile.index', $link->id) }}" class="btn btn-primary">View
                                                    Profile</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    <div>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <hr>
                    <div>
                        @include('profile.partials.update-password-form')
                    </div>
                    <hr>
                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
