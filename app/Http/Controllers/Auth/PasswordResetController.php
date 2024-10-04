<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PasswordResetToken;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Notifications\PasswordResetTokenNotification;

class PasswordResetController
{

    public function forgot(ForgotPasswordRequest $request)
    {
        $token = Str::random(16);
        $user = User::where('email', $request->email)->first();

        $user->clearPasswordResetTokens();

        PasswordResetToken::create([
            'email' => $user->email,
            'token' => $token
        ]);

        $user->notify(new PasswordResetTokenNotification($token));

        return response()->json(['message' => "Password reset token sent successfully to $user->email"], 200);
    }

    public function reset(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $token = PasswordResetToken::where('email', $request->email)->first();

        if(!$token)
        {
            return response()->json(["message" => "Pas de réinitialisation de compte en cours"], 422);
        }

        if($token->isExpired())
        {
            $token->delete();
            return response()->json(["message" => "Token expiré"], 422);
        }

        if(!$token->isValid($request->token))
        {
            $token->delete();
            return response()->json(["message" => "Token Incorrect"], 422);
        }

        $user->update(['password' => $request->password]);

        $user->clearPasswordResetTokens();

        return response()->json("Mot de passe mis à jour", 200);
    }
}
