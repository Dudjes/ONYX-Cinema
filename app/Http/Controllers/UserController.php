<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $users = User::all();

        $totalUsers = $users->count();
        $verifiedUsers = $users->whereNotNull('email_verified_at')->count();
        $unverifiedUsers = $users->whereNull('email_verified_at')->count();

        return view('user.dashboard', compact(
            'users',
            'totalUsers',
            'verifiedUsers',
            'unverifiedUsers'
        ));
    }

    public function info(User $user){
        $user->load([
            'tickets.play.movie',
            'tickets.play.hall',
            'tickets.play.cinema',
        ]);
        return view('user.info', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }
    
    public function update(UpdateUserRequest $request)
    {
        $user = auth()->user(); //works
        $user->update($request->validated());

        return redirect()->route('user.info', compact('user'))->with('success', 'Account updated successfully.');
    }
}
