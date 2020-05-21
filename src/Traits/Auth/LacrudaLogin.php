<?php

namespace RealSoft\Lacruda\Traits\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

trait LacrudaLogin
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('lacruda::auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        return response()->json([
            'redirect' => redirect()->intended($this->redirectPath())->getTargetUrl(),
        ]);
    }
}
