@extends('layouts.master')
@section('title', $user->name)
@section('styles')
    <style>
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* .profile-header img {
                                                                                            width: 150px;
                                                                                            height: 150px;
                                                                                            border-radius: 50%;
                                                                                        } */

        .profile-header h2 {
            margin-top: 15px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card,
        .list-group-item {
            background-color: #EBFFFA;
        }

        .list-group-item:hover {
            background-color: #6EF3D6;
        }
    </style>
@endsection
@section('content')
    <section class="py-5 text-dark" style="background-color: #6EF3D6">
        <div class="container">
            <div class="container">
                <div class="profile-header">
                    {{-- <img src="https://via.placeholder.com/150" alt="User Photo"> --}}
                    <h2>{{ $user->name }}</h2>
                    <p class="text-muted">{{ $user->plan }}</p>
                    @if (Auth::check() || Auth::guard('partner')->check())
                        @if (!$isPartner && Auth::user()->id != $user->id)
                            @if ($link_exists)
                                <h6>You and {{ $user->name }} are linked</h6>
                            @elseif ($request_pending)
                                <h6 class="">Your linking request is pending!</h6>
                            @else
                                @auth
                                    <a href="{{ route('member.linking', $user->id) }}" class="btn btn-primary">Linking request</a>
                                @endauth
                            @endif
                        @endif
                    @endif
                    @if ($errors->has('success'))
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <i class="fa-solid fa-square-check"></i>
                                <strong>Done!</strong> {{ $err }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact Information</h5>
                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                @if (!$isPartner)
                                    <p class="card-text"><strong>Plan:</strong> {{ $user->plan }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">About Me</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Categories</h5>
                                {{-- @foreach ($user->categories as $category)
                                    <span class="badge bg-primary">{{$category->name}}</span>
                                    @endforeach --}}
                                <span class="badge bg-primary">{{ $user->category }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Summary</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Joined since: <span
                                            class="ms-2">{{ $user->created_at->format('F d, Y') }}</span></li>
                                    <li class="list-group-item">Size: <span class="ms-2">{{ $user->size }}MAD</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if ($isPartner)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Latest Posted Offers</h5>
                                    <div class="list-group">
                                        @foreach ($user->offer->take(3) as $offer)
                                            <a href="{{ route('member.offers.show', $offer->id) }}"
                                                class="list-group-item list-group-item-action">
                                                <h6 class="mb-1">{{ $offer->title }}</h6>
                                                <p class="mb-1">{{ $offer->description }}</p>
                                                <small>Posted on {{ $offer->created_at->format('F d, Y') }}</small>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Latest applied Offers</h5>
                                    <div class="list-group">
                                        @foreach ($user->offer->take(3) as $offer)
                                            <a href="{{ Auth::guard('partner')->check() ? route('partner.offers.show', $offer->id) : route('member.offers.show', $offer->id) }}"
                                                class="list-group-item list-group-item-action">
                                                <h6 class="mb-1">{{ $offer->title }}</h6>
                                                <p class="mb-1">{{ $offer->description }}</p>
                                                <small>Applied on {{ $offer->pivot->created_at->format('F d, Y') }}</small>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
