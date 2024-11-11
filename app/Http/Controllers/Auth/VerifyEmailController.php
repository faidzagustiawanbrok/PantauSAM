<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectUserBasedOnRole($request->user());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $this->redirectUserBasedOnRole($request->user());
    }

    /**
     * Redirect user based on their role.
     */
    // app/Http/Controllers/Auth/VerifyEmailController.php
    protected function redirectUserBasedOnRole($user): RedirectResponse
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('verified', 1);
        }

        return redirect()->route('dashboard')->with('verified', 1);
    }

}
