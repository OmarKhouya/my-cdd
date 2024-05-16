@extends('layouts.master')
@section('title', 'Partner')

@section('content')
    <section class="pt-5 text-dark" style="background-color: #6EF3D6;">
        <div class="container">
            <h1 class="text-start mb-3">Welcome back,<br> {{ Auth::guard('partner')->user()->name }}</h1>
            <hr class="w-25">
            <div class="mx-auto d-flex justify-content-center">
                <h1 class="text-center pb-3"> Manage your offers</h1>
                <span style="">{{ $offers->count() }}</span>
            </div>
            <div class="table-responsive">
                <table class="table tabl table-success">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">category</th>
                            <th scope="col">is available</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($offers as $offer)
                            <tr>
                                <td>
                                    {{ $offer->title }}
                                </td>
                                <td>
                                    {{ $offer->description }}
                                </td>
                                <td>
                                    {{ $offer->category }}
                                </td>
                                <td class="text-{{ $offer->availability ? 'success' : 'danger' }}">
                                    {{ $offer->availability ? 'yes' : 'no' }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('partner.offers.edit', $offer) }}" class="btn btn-primary me-2"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('partner.offers.destroy', $offer) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger mx-2">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">no products yet </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $offers->onEachSide(0)->links() }}
        </div>
    </section>
    <section class="py-5 text-dark" style="background-color: #C6FCE5;">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-md-6 border-end border-dark">
                    {{-- <h1 class="text-center">Create new Offer</h1> --}}
                    @include('Offers.create')
                </div>
                <div class="col-md-6 py-3">
                    <p class="fs-1">
                        <b>Ready to Share Your Offer?</b><br>
                        <span class="fs-3">
                            Fill out the form to create a new offer and showcase your value to the CDD.
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 text-dark" style="background-color: #6EF3D6;">
        <div class="container">
            <h1 class="text-center mb-3"> Manage your assignments</h1>
            @if ($errors->has('success'))
                @foreach ($errors->all() as $err)
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <i class="fa-solid fa-square-check"></i>
                        <strong>Done!</strong> {{ $err }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @elseif ($errors->has('danger'))
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-3"></i>
                        <strong>Error!</strong> {{ $err }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
            <table class="table table-success table-bordered">
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>category</th>
                    <th>availability</th>
                    <th>accepted</th>
                    <th>member who applied</th>
                    <th>grant</th>
                    <th>decline</th>
                    <th>change availability</th>
                </tr>
               @forelse($assignments as $offer)
                    <tr>
                        <td>
                            {{ $offer->title }}
                        </td>
                        <td>
                            {{ $offer->description }}
                        </td>
                        <td>
                            {{ $offer->category }}
                        </td>
                        <td class="text-{{ $offer->availability ? 'success' : 'danger' }}">
                            {{ $offer->availability ? 'available' : 'unavailable' }}
                        </td>
                        <td class="text-{{ $offer->accepted ? 'success' : 'danger' }}">
                            {{ $offer->accepted ? 'accepted' : 'not accepted' }}
                        </td>
                        <td>
                            {{ $offer->user_name }}
                        </td>
                        <td>
                            <a class="btn btn-success"
                                href="{{ route('partner.offers.grant', $offer->offers_id) }} ">Grant</a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                                href="{{ route('partner.offers.decline', $offer->offers_id) }}">Decline</a>
                        </td>
                        <td>
                            <form action="{{ route('partner.offers.availabilityToggle', $offer->offers_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @if ($offer->availability == true)
                                    <input type="checkbox" class="form-check-input d-none" name="availability"
                                        id="availability">
                                    <button class="btn btn-danger" type="submit">unavailable</button>
                                @elseif ($offer->availability == false)
                                    <input type="checkbox" checked class="form-check-input d-none" name="availability"
                                        id="availability">
                                    <button class="btn btn-success" type="submit">available</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No offers applied yet</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </section>
@endsection
