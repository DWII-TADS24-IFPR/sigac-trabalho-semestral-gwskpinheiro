<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionResetController extends Controller
{
    /**
     * Invalida qualquer sessão ativa e redireciona para login.
     */
    public function logoutAndRedirect()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/login');
    }
}
