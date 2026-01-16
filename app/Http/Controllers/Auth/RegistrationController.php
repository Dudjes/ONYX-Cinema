<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        // split name into firstname/lastname and create User directly
        [$firstname, $lastname] = array_pad(explode(' ', $validated['name'], 2), 2, '');

        $userData = $validated;
        $userData['firstname'] = $firstname ?: $validated['name'];
        $userData['lastname'] = $lastname;

        event(new Registered(($user = User::create($userData))));

        Auth::login($user);

        return redirect('/');
    }
}
