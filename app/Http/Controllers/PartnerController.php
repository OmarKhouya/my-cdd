<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnerId = Auth::guard('partner')->user()->id;
        $offers = Partner::find($partnerId)->offer()->paginate(20);

        /* get all offers members did apply to */
        $assignments = Offers::where('offers.partner_id', $partnerId)
            ->join('assignments', 'assignments.offers_id', '=', 'offers.id')
            ->join('users', 'users.id', '=', 'assignments.user_id')
            ->select(['offers.*', 'users.name as user_name', 'users.id as user_id', 'assignments.accepted'])
            ->get();
        return view('partner.dashboard', compact('offers', 'assignments'));
    }
    /**
     * Show the form for login.
     */
    public function login()
    {
        return view('partner.login');
    }
    /**
     * Store a login request to the application.
     */
    public function login_store(Request $request)
    {
        $remember = $request->remember ? true : false;
        $check = Auth::guard('partner')->attempt(['email' => $request->email, 'password' => $request->password], $remember);
        if ($check) {
            return redirect()->route('partner.dashboard');
        } else {
            return redirect()->route('partner.login')->with('credentials', 'The provided credentials do not match our records.');
        }
    }
    /**
     * Display the registration view.
     */
    public function register()
    {
        return view('partner.register');
    }
    /**
     * Store a newly created Partner.
     */
    public function register_store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Partner::class],
            'category' => ['required', 'string', 'max:255'],
            'size' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $partner = Partner::create([
            'name' => $request->name,
            'email' => $request->email,
            'category' => $request->category,
            'size' => $request->size,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('partner')->login($partner);

        return redirect()->route('partner.dashboard');
    }
    /**
     * Partner Logout
     */
    public function logout()
    {
        Auth::guard('partner')->logout();
        return redirect()->route('partner.login');
    }
    /**
     * Display the Partner profile.
     */
    public function edit(Request $request)
    {
        $user = Auth::guard('partner')->user();
        return view('profile.edit', compact('user'));
    }
    /**
     * Update the Partner profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',],
            'category' => ['required', 'string', 'max:255'],
            'size' => ['required', 'string', 'max:255'],
        ]);

        $user = Partner::where('email', $request->email)->first();

        $user->update(['name' => $request->name, 'category' => $request->category, 'size' => $request->size]);

        return view('profile.edit', compact('user'))->with('status', 'profile-updated');
    }
    /**
     * Update the Partner password.
     */
    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::guard('partner')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return view('profile.edit', compact('user'))->with('status', 'password-updated');
    }
    /**
     * Delete the Partner profile.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $user = Auth::guard('partner')->user();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
        }

        $user->delete();

        Auth::guard('partner')->logout();

        return redirect()->route('home')->with('status', 'account-deleted');
    }

    /**
     * Display Partner Profile
     */
    public function profile(String $id)
    {
        $user = Partner::find($id);
        $isPartner = true;
        return view('profile.index', compact('user', 'isPartner'));
    }

}
