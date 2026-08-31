<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function show(): View|RedirectResponse
    {
        if (session()->has('demo_user_id')) {
            return to_route('dashboard');
        }

        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::query()->where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return back()->withInput($request->only('email'))->withErrors(['email' => 'Email atau password demo belum sesuai.']);
        }

        $request->session()->regenerate();
        $request->session()->put('demo_user_id', $user->id);

        return to_route('dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->forget('demo_user_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('notice', 'Anda sudah keluar dari workspace demo.');
    }
}
