@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <section class="py-5 text-dark" style="background-color: #C6FCE5;">
        <div class="container">
            <h1>Applied Offers</h1>
            <hr class="w-25">
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
                <tr class="text-center">
                    <th>title</th>
                    <th>description</th>
                    <th>category</th>
                    <th>availability</th>
                    <th>partner</th>
                    <th>accepted by partner</th>
                    <th>last update</th>
                    <th>action</th>
                </tr>
                @forelse ($appliedOffers as $offer)
                    <tr>
                        <td><a href="{{ route('member.offers.show', $offer) }}" class="text-dark">{{ $offer->title }}</a>
                        </td>
                        <td>{{ $offer->description }}</td>
                        <td class="text-center">{{ $offer->category }}</td>
                        <td class="text-center {{ $offer->availability ? 'text-success' : 'text-danger' }}">
                            {{ $offer->availability ? 'available' : 'unavailable' }}</td>
                        <td class="text-center">{{ $offer->partner->name }}</td>
                        <td class="text-center {{ $offer->pivot->accepted ? 'text-success' : 'text-danger' }}">
                            {{ $offer->pivot->accepted ? 'accepted' : 'not accepted' }}</td>
                        <td class="text-center">{{ $offer->created_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('member.apply.drop', $offer) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-flex"><i
                                        class="fa-regular fa-square-minus me-2 my-auto"></i>Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="8"><i class="fa-regular fa-face-sad-tear me-2"></i> offers applied yet
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </section>
@endsection
