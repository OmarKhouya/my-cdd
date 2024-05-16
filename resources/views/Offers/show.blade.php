@extends('layouts.master')
@section('title', "offer $offer->title")
@section('content')

    <section class="text-dark d-flex justify-content-center align-items-center"
        style="background-color: #C6FCE5;height:79vh;">
        <div class="container">
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
            <h1 class="text-center">{{ $offer->title }}</h1>
            <div class="row">
                <div class="col-md-6 my-3">
                    <p class="fs-4">
                        {{ $offer->description }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p><b class="me-3"><i class="fa-solid fa-layer-group me-2"></i>Category:</b> {{ $offer->category }}
                    </p>
                    <p><b class="me-3"><i class="fa-regular fa-circle-check me-2"></i>is available:</b>
                        @if ($offer->availability)
                            <span class='text-success'>yes</span>
                        @else
                            <span class=' text-danger'>no</span>
                        @endif
                    </p>
                    <p><b class="me-3"><i class="fa-solid fa-handshake me-2"></i>Partner:</b> {{ $offer->partner->name }}
                    </p>
                    <p><b class="me-3"><i class="fa-solid fa-pen-to-square me-2"></i>Last Update:</b> Updated
                        {{ $offer->updated_at->diffForHumans() }}</p>
                    <p><b class="me-3"><i class="fa-solid fa-calendar-plus me-2"></i>Created at:</b>
                        {{ $offer->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-end">
                @if ($offer->availability)
                    <form action="{{ route('member.offers.apply', $offer) }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark mx-2">Apply</button>
                        </div>
                    </form>
                @else
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-dark" disabled>Apply</button>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
