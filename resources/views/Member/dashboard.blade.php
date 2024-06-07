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
                        <td class="text-center"><a href="{{ route('partner.profile.index', $offer->partner->id) }}"
                                class="text-dark">{{ $offer->partner->name }}</a></td>
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
                        <td class="text-center" colspan="8"><i class="fa-regular fa-face-sad-tear me-2"></i> offers
                            applied yet
                        </td>
                    </tr>
                @endforelse
            </table>
            {{ $appliedOffers->onEachSide(0)->links() }}
        </div>
    </section>
    <section class="py-5 text-dark" style="background-color: #EBFFFA;">
        <div class="container">
            <h3>find out other members you may know</h3>
            <hr class="w-25">
            <div class="row">
                @foreach($suggested_users as $member)
                    <div class="col-md-2 my-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $member->name }}</h5>
                                <p class="card-text text-muted">{{ $member->email }}</p>
                                <p class="text-muted">{{$member->category}}</p>
                                <a href="{{ route('profile.index', $member->id) }}" class="btn btn-primary">View
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
