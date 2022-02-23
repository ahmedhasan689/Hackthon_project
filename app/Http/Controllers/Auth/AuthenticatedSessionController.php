<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // dd($request->type);
        if ($request->type == 'customer') {

            $guardName = 'customer';

        } elseif ($request->type == 'delivery') {

            $guardName = 'delivery';

        } elseif ($request->type == 'user') {

            $guardName = 'web';

        }

        if (Auth::guard($guardName)->attempt([
            'phone_number' => $request->phone_number,
            'password' => $request->password,
        ])) {

            Session::put('guardName', $guardName);

            if ($request->type == 'customer') {

                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            } elseif ($request->type == 'delivery') {

                return redirect()->intended(RouteServiceProvider::HOME);
            } elseif ($request->type == 'user') {

                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard( session('guardName') )->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function select($type)
    {
        return view('auth.login', compact('type'));
    }
}
