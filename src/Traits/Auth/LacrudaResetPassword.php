<?php

namespace RealSoft\Lacruda\Traits\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

trait LacrudaResetPassword
{
    use ResetsPasswords;

    public function showResetForm(Request $request, $token = null)
    {
        return view('lacruda::auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json([
            'redirect' => redirect($this->redirectPath())->getTargetUrl(),
        ]);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json([
            'errors' => ['email' => [trans($response)]],
        ], 422);
    }
}
