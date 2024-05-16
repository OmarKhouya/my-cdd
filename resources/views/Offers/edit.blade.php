@extends('layouts.master')
@section('title', 'Create Offer')
@section('content')

    <section class="py-5 text-dark d-flex justify-content-center align-items-center"
        style="background-color: #C6FCE5;height: 77vh;">
        <div class="container">
            @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{-- <strong>Error!</strong>  --}}{{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
            @endif
            <form action="{{ route('partner.offers.update', $offer) }}" method="POST" enctype="multipart/form-data"
                id="offerForm" class="col-lg-6 mx-auto">
                <h1 class="text-center">Update Offer <br> {{ $offer->title }}</h1>
                @csrf
                @method('put')
                <div class="my-3">
                    <label for="title" class="input-label">Title</label>
                    <input type="text" class="form-control" name="title" autofocus required
                        value="{{ $offer->title }}">
                </div>
                <div class="my-3">
                    <label for="description" class="input-label">Description</label>
                    <textarea type="text" class="form-control" name="description" required>{{ $offer->description }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 my-3">
                        <label for="category" class="input-label">Category</label>
                        <input type="text" class="form-control" name="category" required value="{{ $offer->category }}">
                    </div>
                    <div class="col-md-6 m-auto">
                        <label for="availability" class="input-label">Is available</label>
                        <input type="checkbox" class="form-check-input" name="availability" 
                            {{ $offer->availability ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </section>

@endsection
