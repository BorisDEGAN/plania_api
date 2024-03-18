<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\SearchUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserListResource;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $per_page = ($request->per_page > 100) ? 10 : $request->per_page;

        return UserListResource::collection(User::with(["profile", "roles"])->orderByDesc('created_at')->paginate($per_page));
    }

    public function search(SearchUserRequest $request)
    {
        $email = $request->email;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $role_ids = $request->role_ids;
        $roles = $request->roles;
        $per_page = $request->per_page ?? 10;
        

        $users = User::query()->with(['roles']);

        if($email)
        {
            $users = $users->where('email', 'ILIKE', '%'.$email.'%');
        }

        if($firstname)
        {
            $users = $users->where('firstname', 'ILIKE', '%'.$firstname.'%');
        }

        if($lastname)
        {
            $users = $users->where('lastname', 'ILIKE', '%'.$lastname.'%');
        }

        if($roles)
        {
            $users = $users->whereHas('roles', function($role_item) use (&$roles)
            {
                $role_item->whereIn('alias', $roles);
            });
        }
        
        if($role_ids)
        {
            $users = $users->whereHas('roles', function($role) use (&$role_ids)
            {
                $role->whereIn('id', $role_ids);
            });
        }

        return UserListResource::collection($users->orderByDesc('created_at')->paginate($per_page));

    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());

        if($request->roles)
        {
            $roles = Role::whereIn('alias', $request->roles)->pluck('id');
            $user->roles()->syncWithoutDetaching($roles);
        }
        elseif($request->role_ids)
        {
            $user->roles()->syncWithoutDetaching($request->role_ids);
        }

        return (new UserListResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserListResource($user->load('roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        if($request->role_ids != null)
        {
            $user->roles()->detach($user->roles->pluck('id'));
            $user->roles()->syncWithoutDetaching($request->role_ids);
        }
        return (new UserListResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
