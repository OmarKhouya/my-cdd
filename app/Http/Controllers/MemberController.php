<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index () {
        $appliedOffers = Auth::user()->offer;
        return view('member.dashboard',compact('appliedOffers'));
    }

    public function drop (Offers $offer) {
        Auth::user()->offer()->detach($offer->id);
        return redirect()->back()->withErrors(['success'=>'Offer dropped successfully']);
    }
}
