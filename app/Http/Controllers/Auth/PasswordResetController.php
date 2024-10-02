<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\PasswordResetToken;
use App\Notifications\PasswordResetTokenNotification;

class PasswordResetController
{

    public function forgot(ForgotPasswordRequest $request)
    {
        $token = Str::random(16);
        $user = User::where('email', $request->email)->first();
        $user->notify(new PasswordResetTokenNotification($token));

        return response()->json(['message' => "Password reset token sent successfully to $user->email"], 200);
    }

    public function reset(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $token = PasswordResetToken::where('email', $request->email)->first();

        if(!$token)
        {
            return response()->json("Pas de réinitialisation de compte en cours", 422);
        }

        if($token->isExpired())
        {
            $token->delete();
            return response()->json("Token expire", 422);
        }

        if(!$token->isValid($request->token))
        {
            $token->delete();
            return response()->json("Token Incorrect", 422);
        }

        $user->update(['password' => $request->password]);

        $user->clearPasswordResetTokens();

        return response()->json("Mot de passe mis à jour", 200);
    }
}
