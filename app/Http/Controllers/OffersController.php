<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Threeoffers = Offers::all()->take(3);
        $allOffers = Offers::paginate(21);
        return view('Offers.index', compact('Threeoffers', 'allOffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:50'],
            'availability' => ['required', 'string'],
        ]);

        $offer = Offers::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'availability' => $request->availability ? 1 : 0,
            'partner_id' => Auth::guard('partner')->user()->id,
        ]);

        $offer->save();

        return redirect()->back()->with('status', 'Offer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offers $offer)
    {
        return view('Offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offers $offer)
    {
        // Gate::authorize('update', $offer);
        return view('Offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offers $offer)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:50'],
        ]);

        $offer->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'availability' => $request->availability ? true : false,
            'partner_id' => Auth::guard('partner')->user()->id,
        ]);

        return redirect()->route('partner.offers.edit', $offer)->with('success', 'Offer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offers $offer)
    {
        $offer->delete();
        return redirect()->back()->with('success', 'Offer deleted successfully');
    }
    /**
     * Member can apply for an offer
     */
    public function apply(Offers $offer)
    {
        $user = Auth::user();

        if (!$user->offer()->where('offers.id', $offer->id)->exists()) {
            $user->offer()->save($offer, ['partner_id' => $offer->partner_id]);
            return redirect()->back()->withErrors(['success' => 'Offer applied successfully']);
        } else {
            return redirect()->back()->withErrors(['danger' => 'You have already applied to this offer.']);
        }
    }
    /**
     *  Partner can decline a user applyment for offer
     */
    public function decline(String $id)
    {
        $partner_id = Auth::guard('partner')->user()->id;
        DB::table('assignments')
            ->where('assignments.partner_id', $partner_id)
            ->where('assignments.offers_id', $id)
            ->delete();
        return redirect()->route('partner.dashboard', '#manageApplications')->withErrors(['success' => 'Offer applyment declined successfully']);
    }
    /**
     *   Partner can accept a user applyment for offer
     */
    public function grant(String $id)
    {
        $partner_id = Auth::guard('partner')->user()->id;

        $assignment = DB::table('assignments')
            ->join('offers', 'assignments.offers_id', '=', 'offers.id')
            ->where('offers.id', $id)
            ->where('offers.partner_id', $partner_id)
            ->select('assignments.*')
            ->first();

        if ($assignment) {
            DB::table('assignments')
                ->where('id', $assignment->id)
                ->update(['accepted' => true]);
            return redirect()->route('partner.dashboard', '#manageApplications')->withErrors(['success' => 'Offer granted successfully']);
        } else {
            return redirect()->route('partner.dashboard', '#manageApplications')->withErrors(['danger' => 'cound not grant assignment']);
        }
    }
    /**
     *   Partner can Toggle offer availability
     */
    public function availabilityToggle(Request $request, String $id)
    {
        $offer = Offers::find($id);
        $offer->update([
            'availability' => $request->availability ? 1 : 0,
        ]);
        $offer->save();
        return redirect()->route('partner.dashboard', '#manageApplications')->with('success', 'Offer updated successfully');
    }
}
