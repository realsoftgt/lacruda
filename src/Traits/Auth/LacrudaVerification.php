<?php

namespace RealSoft\Lacruda\Traits\Auth;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

trait LacrudaVerification
{
    use VerifiesEmails;

    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('lacruda::auth.verify');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'redirect' => redirect($this->redirectPath())->getTargetUrl(),
            ]);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'jquery' => [
                'selector' => '#auth-verify-form',
                'method' => 'replaceWith',
                'content' => view('lacruda::auth.verify-resent')->render(),
            ],
        ]);
    }
}
