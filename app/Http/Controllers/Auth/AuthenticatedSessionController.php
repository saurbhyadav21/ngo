<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{
       $type = $request->input('type', 'admin'); 
 

       
// dd($type);
    $credentials = $request->only('email', 'password');
// dd($credentials);

    if ($type == 'admin') {
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
    } elseif ($type == 'manager') {
        if (Auth::guard('manager')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/manager/dashboard');
        }
    } elseif ($type == 'coordinator') {
        if (Auth::guard('coordinator')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/coordinator/dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'These credentials do not match our records.',
    ]);
}



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
