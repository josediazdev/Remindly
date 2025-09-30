<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show(){

        $user = Auth::user();

        return view('profile.show', ['user' => $user]);
    }

    public function save(){

        request()->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'current_password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        $user->update([
            'email' => request('email')
        ]);

        return view('profile.show', ['user' => $user]);
    }


    public function update(){

        request()->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::min(6)->letters()->numbers(), 'confirmed'],
        ]);


        $user = Auth::user();

        $user->update([
            'password' => request('password')
        ]);

        return view('profile.show', ['user' => $user]);
    }

    public function destroy(){

        $user = Auth::user();

        $user->delete();

        return redirect('/');
    }
}
