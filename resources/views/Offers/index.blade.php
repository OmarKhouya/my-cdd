@extends('layouts.master')
@section('title', 'Offers')
@section('content')
    <section class="py-5 text-dark" style="background-color: #C6FCE5;">
        <div class="container">
            <div class="text-center">
                <h1 class="">My CDD Offers</h1>
                <p class="text-muted fs-5">Explore a curated selection of valuable deals from our partners.</p>
                <hr class="mx-auto w-75">
            </div>
            <div class="row">
                <div class="card-group col-md-8 mx-auto">
                    @forelse ($Threeoffers as $offer)
                        <div class="card text-center " style="background: #EBFFFA">
                            <div class="card-header">
                                <h5 class="card-titlemb-0 my-2">{{ $offer->title }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $offer->description }}.</p>
                                <p class="text-muted">added by {{ $offer->partner->name }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated
                                    {{ $offer->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @empty
                        <div>
                            <h3 class="text-center">No offers yet</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 text-dark" style="background-color: #EBFFFA">
        <div class="container">
            <h1 class="text-center"> Unlock Exclusive Member Deals!</h1>
            <div class="text-muted text-center">
                <p>Empower your membership and discover a world of exciting benefits just for you. <br> Explore our curated
                    selection of special offers and discounts from trusted partners.</p>
            </div>
        </div>
    </section>
    <section class="pb-5 pt-3 text-dark" style="background-color: #6EF3D6">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @forelse ($allOffers as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card m-auto" style="width: 18rem;background-color: #EBFFFA">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $item->title }}</h5>
                                <p class="card-text text-center text-muted">
                                    {{ \Illuminate\Support\Str::limit($item->description, $limit = 50, $end = '...') }}
                                </p>
                                <p class="text-center">
                                    <small class="text-muted">added by {{ $item->partner->name }}</small>
                                </p>
                                <p class="text-center">
                                    <small class="text-{{$item->availability ? 'success' : 'danger'}}">{{ $item->availability? 'available' : 'unavailable' }}</small>
                                </p>
                                <hr class="w-100 mb-2 m-auto">
                                <div class=" text-center">
                                    <small class="text-body-secondary">Last updated
                                        {{ $offer->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <a href="{{ Auth::guard('partner')->check() ? route('partner.offers.show', $item) : route('member.offers.show', $item) }}"
                                class="btn text-dark w-100  rounded-top-0" style="background-color: #0DCEDA">
                                View
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <p class="fs-3">no offers yet</p>
                    </div>
                @endforelse
            </div>
            {{ $allOffers->onEachSide(0)->links() }}
        </div>
    </section>
@endsection
