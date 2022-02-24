<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::all();
        return view('Front.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Auth::guard(session('guardName'))->user();

        // dd($userAuth);

        // $profile = Profile::where( session('guardName').'_id', $id )->first();
        // dd($profile);
        return view('Front.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'nullable|numeric|min:10',
            'avatar' => 'nullable',
            'old_password' => 'nullable|min:8|max:20',
            'new_password' => 'nullable|min:8|max:20',
            're_password' => 'nullable|min:8|max:20',
        ]);

        $avatar_path = null;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $avatar_path = $file->store('/', [
                'disk' => 'uploads'
            ]);
        } else {
            $avatar_path = null;
        }



        if (session('guardName') == 'web') {
            $user = User::findOrFail($id);

            $password_input = null;

            if ($request->post('password')) {
                if (Hash::check($request->password, Auth::user()->password) && $request->post('new-password') ==  $request->post('re-password')) {
                    $password_input =  Hash::make($request->post('new-password'));
                }
            } else {
                $password_input = $user->password;
            }

            // dd($request);
            $user->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'project_name' => $request->project_name,
                'avatar' => $avatar_path,
                'password' => $password_input,
            ]);
        } elseif (session('guardName') == 'customer') {
            $customer = Customer::findOrFail($id);

            // dd($request);
            $password_input = null;

            if ($request->post('password')) {
                if (Hash::check($request->password, Auth::user()->password) && $request->post('new-password') ==  $request->post('re-password')) {
                    $password_input =  Hash::make($request->post('new-password'));
                }
            } else {
                $password_input = $customer->password;
            }

            // dd($request);
            $customer->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'avatar' => $avatar_path,
                'password' => $password_input,
            ]);
        }elseif (session('guardName') == 'delivery') {
            $delivery = Delivery::findOrFail($id);

            // dd($request);
            $password_input = null;

            if ($request->post('password')) {
                if (Hash::check($request->password, Auth::user()->password) && $request->post('new-password') ==  $request->post('re-password')) {
                    $password_input =  Hash::make($request->post('new-password'));
                }
            } else {
                $password_input = $delivery->password;
            }

            // dd($request);
            $delivery->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'avatar' => $avatar_path,
                'password' => $password_input,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
