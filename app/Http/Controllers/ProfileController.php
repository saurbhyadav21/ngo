<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function welcome()
{
    // Get last 5 images by created_at descending
    $sliderImages = DB::table('slider_image')->orderBy('created_at', 'desc')->take(5)->get();
    $aboutus  = DB::table('about_us_post')->orderBy('created_at', 'desc')->first();
    $managementTeam = DB::table('management')->orderBy('created_at', 'desc')->get();
    $companyProfile = DB::table('company_profile')->orderBy('created_at', 'desc')->first();

    $customers = DB::table('customers')
    ->where('status', 1)
    ->orderBy('created_at', 'desc')
    ->get();
    $objectives = DB::table('objectives')
    ->orderBy('created_at', 'desc')
    ->get();

    $testimonials = DB::table('testimonials')
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();

    $activities = DB::table('activity')
        ->orderBy('event_start', 'desc')
        ->limit(4)
        ->get();

    return view('welcome', compact('sliderImages', 'aboutus', 'managementTeam', 
    'companyProfile','customers','objectives','testimonials','activities'));
}
}
