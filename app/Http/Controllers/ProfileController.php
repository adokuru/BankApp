<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }
        return redirect()->back()->with('success', 'Profile updated.');
    }
    public function updateAccount(Request $request)
    {
        $user = User::find($request->id);
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'postal_code' => $request->postal_code,
        ]);
        return redirect()->back()->with('success', 'Account updated.');
    }
}
