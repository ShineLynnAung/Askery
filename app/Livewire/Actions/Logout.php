<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
    }

    public function performLogout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully');
    }
}
