<?php

namespace App\Http\Controllers;

use App\Models\Linking;
use App\Models\Offers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of Applied Offers for Member and suggested users to link with
     */
    public function index()
    {
        $current_user = Auth::user();
        $current_user_id = $current_user->id;

        // Get IDs of users who are already linked or have pending requests with the current user
        $linked_user_ids = Linking::where(function ($query) use ($current_user_id) {
            $query->where('user_id', $current_user_id)
                ->orWhere('linked_user_id', $current_user_id);
        })->pluck('user_id', 'linked_user_id')->flatten()->unique();

        // Suggest users to link with (excluding already linked and pending users)
        $suggested_users = User::where('id', '!=', $current_user_id)
            ->whereNotIn('id', $linked_user_ids)
            ->limit(20)
            ->get();

        $appliedOffers = $current_user->offer;
        return view('member.dashboard', compact('appliedOffers', 'suggested_users'));
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
     * Display Member Profile
     */
    public function profile(String $id)
    {
        $link_exists = false;
        $request_pending = false;
        $user = User::findOrFail($id);

        if (Auth::check()) {
            $current_user_id = Auth::user()->id;

            // Check if there is any accepted linking between the current user and the profile user
            $linkExists = Linking::where(function ($query) use ($id, $current_user_id) {
                $query->where('linked_user_id', $id)
                    ->where('user_id', $current_user_id)
                    ->where('accepted', 1);
            })->orWhere(function ($query) use ($id, $current_user_id) {
                $query->where('linked_user_id', $current_user_id)
                    ->where('user_id', $id)
                    ->where('accepted', 1);
            })->exists();

            // Check if there is any pending linking request between the current user and the profile user
            $linkRequestPending = Linking::where(function ($query) use ($id, $current_user_id) {
                $query->where('linked_user_id', $id)
                    ->where('user_id', $current_user_id)
                    ->where('accepted', 0);
            })->orWhere(function ($query) use ($id, $current_user_id) {
                $query->where('linked_user_id', $current_user_id)
                    ->where('user_id', $id)
                    ->where('accepted', 0);
            })->exists();

            if ($linkExists) {
                $link_exists = true;
                $request_pending = false;
            } elseif ($linkRequestPending) {
                $request_pending = true;
                $link_exists = false;
            }
        }

        $isPartner = false;
        return view('profile.index', compact('user', 'isPartner', 'link_exists', 'request_pending'));
    }


    /**
     * Members can do a linking request
     */
    public function linking(String $id)
    {
        $current_user = Auth::user();
        $user = User::findOrFail($id);

        Linking::create([
            'user_id' => $current_user->id,
            'linked_user_id' => $user->id,
        ]);

        return redirect()->back()->withErrors(['success' => 'Linking request sent successfully']);
    }

    /**
     * Members can accept linking request
     */
    public function accept(String $id)
    {
        $current_user = Auth::user();
        $linking = Linking::where('linked_user_id', $current_user->id)
            ->where('user_id', $id)
            ->firstOrFail();

        $linking->update(['accepted' => 1]);

        return redirect()->back()->withErrors(['success' => 'Linking request accepted successfully']);
    }


    /**
     * Members can reject linking request
     */
    public function reject(String $id)
    {
        $current_user = Auth::user();
        $linking = Linking::where('linked_user_id', $current_user->id)
            ->where('user_id', $id)
            ->firstOrFail();

        $linking->delete();

        return redirect()->back()->withErrors(['success' => 'Linking request rejected successfully']);
    }
}
