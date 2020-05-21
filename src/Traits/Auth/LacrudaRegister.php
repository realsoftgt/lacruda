<?php

namespace RealSoft\Lacruda\Traits\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

trait LacrudaRegister
{
    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('lacruda::auth.register');
    }

    protected function registered(Request $request, $user)
    {
        return response()->json([
            'redirect' => redirect($this->redirectPath())->getTargetUrl(),
        ]);
    }
}
