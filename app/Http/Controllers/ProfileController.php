<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.settings');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        
        $user->update($request->validated());

        return back()->with('status', 'Profil został zaktualizowany.');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Hasło zostało zmienione.');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();
        
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Konto zostało usunięte.');
    }
} 