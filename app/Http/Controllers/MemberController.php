<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     *  Display a listing of Applied Offers for Member
     */
    public function index()
    {
        $appliedOffers = Auth::user()->offer;
        return view('member.dashboard', compact('appliedOffers'));
    }
    /**
     *  remove an applied offer by Member
     */
    public function drop(Offers $offer)
    {
        Auth::user()->offer()->detach($offer->id);
        return redirect()->back()->withErrors(['success' => 'Offer dropped successfully']);
    }
    /**
     *  Display Member Profile
     */
    public function profile(String $id)
    {
        $user = User::findOrFail($id);
        $isPartner = false;
        return view('profile.index', compact('user','isPartner'));
    }
}
