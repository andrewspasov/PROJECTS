<?php

namespace App\Http\Controllers\API;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $user = new User([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'regular',
            'is_active' => false,
        ]);

        $token = Str::random(40);
        $user->token = $token;

        $user->save();

        Cache::put('user_activation_' . $user->id, now()->addMinutes(2), 120);

        event(new UserCreated($user, $token));

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if (array_key_exists('password', $validated)) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    public function toggleActive(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return response()->json($user);
    }

}
