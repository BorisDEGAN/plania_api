<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Profile;
use App\Models\Secteur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AppConfiguration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Notification\MailObject;
use App\Http\Requests\Auth\CheckNPIRequest;
use App\Http\Requests\Auth\LoginOTPRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\CheckRCCMRequest;
use App\Http\Resources\User\UserShortResource;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Services\Notification\NotificationService;

class AuthController extends Controller
{
    /**
     * Register.
     *
     * @return \App\User
     */
    protected function register(RegisterRequest $request) : JsonResponse
    {
        $user = User::create([
            'firstname'     => $request->firstname ?? $request->nom_promoteur,
            'lastname'     => $request->lastname ?? $request->prenoms_promoteur,
            'email'    => $request->email ?? $request->email_promoteur,
            'password' => Hash::make($request->password),
        ]);

        $roles = Role::whereIn('alias', array_merge([Role::COLLABORATOR_ROLE_ALIAS], $request->roles ?? []))->get()->pluck('id')->toArray();

        $user->roles()->attach($roles);
        
        return $this->handleResponse($user, trans('auth.registered'), Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request) : JsonResponse
    {
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) 
        {
            $user = User::find(Auth::user()->id);

            $data["token"] = $user->createToken("LaravelSanctumAuth")->plainTextToken;
            
            $data['user'] = new UserShortResource($user->load('roles'));

            return $this->handleResponse($data, trans('auth.login'));

        } else {

            return $this->handleResponse([], trans('auth.failed'), Response::HTTP_UNAUTHORIZED, false);
        }
    }

    public function logout() : JsonResponse
    {
        Auth::logout();

        return $this->handleResponse(null, trans('auth.logout'));
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);

        if(Hash::check($request->old_password, $user->password))
        {
            if(Hash::check($request->password, $user->password))
            {
                return $this->handleResponse([], trans('passwords.must_not_match'), 422, false);
            }
            $user->update(['password' => $request->password]);

            return $this->handleResponse([], trans('passwords.changed'));
        }
        return $this->handleResponse([],trans('auth.failed'), Response::HTTP_UNPROCESSABLE_ENTITY, false);
    }
}
