<?php

namespace RealSoft\Lacruda\Traits\Auth;

use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;

trait LacrudaConfirmPassword
{
    use ConfirmsPasswords;

    public function showConfirmForm()
    {
        return view('lacruda::auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $this->resetPasswordConfirmationTimeout($request);

        return response()->json([
            'redirect' => redirect()->intended($this->redirectPath())->getTargetUrl()
        ]);
    }
}
