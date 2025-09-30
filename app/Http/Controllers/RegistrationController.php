<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegistrationController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){

        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)->letters()->numbers(), 'confirmed']
        ]);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        Auth::login($user);

        return redirect('/tasks');
    }

}
