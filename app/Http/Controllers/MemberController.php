<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     *  Display a listing of Applied Offers for Member
     */
    public function index()
    {
        $members = User::paginate(20);
        $appliedOffers = Auth::user()->offer;
        return view('member.dashboard', compact('appliedOffers', 'members'));
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
        $link_exists = false;
        $request_pending = false;
        $user = User::findOrFail($id);
        if (Auth::check()) {
            $linkExists = DB::table('linkings')->where('linked_user_id', $id)->where('user_id', Auth::user()->id)->where('accepted', 1)->select(['*']);
            $linkRequestPending = DB::table('linkings')->where('linked_user_id', $id)->where('user_id', Auth::user()->id)->where('accepted', 0)->select(['*']);
            if ($linkExists->count() > 0) {
                $link_exists = true;
                $request_pending = false;
            } elseif ($linkRequestPending->count() > 0) {
                $request_pending = true;
                $link_exists = false;
            }
        }
        $isPartner = false;
        return view('profile.index', compact('user', 'isPartner', 'link_exists', 'request_pending'));
    }
    /**
     *  Members can do a linking request
     */
    public function linking(String $id)
    {
        $current_user = Auth::user();
        $user = User::findOrFail($id);
        DB::table('linkings')->insert(['user_id' => $current_user->id, 'linked_user_id' => $user->id]);
        return redirect()->back()->withErrors(['success' => 'Linking request sent successfully']);
    }
}
