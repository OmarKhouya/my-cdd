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
                                    Linkings informations
                                </h2>
                                <p class="text-muted">Here you can accept or deny linking requests</p>
                                <table class="table">
                                    <tr>
                                        <th>link id</th>
                                        <th>user linking</th>
                                        <th>accepted</th>
                                        <th>action</th>
                                        <th>since</th>
                                    </tr>
                                    @foreach ($user->linkedBy as $link)
                                        <tr>
                                            <td class="card-title">{{ $link->id }}</td>
                                            <td>{{ $link->user->name }}</td>
                                            <td>{{ $link->accepted ? 'yes' : 'no' }}</td>
                                            <td>
                                                @if ($link->accepted)
                                                    <a class="btn btn-danger"
                                                        href="{{ route('member.linking.reject', $link->user->id) }}">remove</a>
                                                @else
                                                    <a class="btn btn-success"
                                                        href="{{ route('member.linking.accept', $link->user->id) }}">accept</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ route('member.linking.reject', $link->user->id) }}">reject</a>
                                                @endif
                                                <a href="{{ route('profile.index', $link->user->id) }}"
                                                    class="btn btn-primary">View
                                                    Profile</a>
                                            </td>
                                            <td>
                                                {{ $link->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
