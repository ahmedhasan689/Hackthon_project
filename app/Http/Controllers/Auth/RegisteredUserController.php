<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\User;
use App\Models\City;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Delivery;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'age' => ['required', 'numeric'],
        ]);

        // dd($request);
        if ($request->type == 'user') {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'age' => $request->age,
                'job' => $request->job,
                'project_name' => $request->project_name,
                'city_id' => $request->city,
                'category_id' => $request->category,
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);

        } elseif ($request->type == 'customer') {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'age' => $request->age,
                'city_id' => $request->city,
                'address' => $request->address,
            ]);

            event(new Registered($customer));

            Auth::login($customer);

            return redirect(RouteServiceProvider::HOME);

        } elseif ($request->type == 'delivery') {
            $delivery = Delivery::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'age' => $request->age,
                'city_id' => $request->city,
            ]);

            event(new Registered($delivery));

            Auth::login($delivery);

            return redirect(RouteServiceProvider::HOME);
        }

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }

    public function select($type)
    {
        $cities = City::all();
        $categories = Category::all();
        return view('auth.register', compact('type', 'cities', 'categories'));
    }
}
