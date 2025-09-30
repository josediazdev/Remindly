@extends('components.layout')
@section('title', 'Sign up')

@section('content')

    <div class="main-section-container">
        <section class="panel-hero-container">
            <div class="main-logo-container">
                <img class="logo-img" src="{{ Vite::asset('resources/images/logo.webp') }}">
                <h1 class="logo-text">Remindly</h1>
                <p>Your ideal Task Manager</p>
            </div>

            <div class="form-container">
                <form action="/register" method="POST">
                    @csrf
                    <div class="two-fields">
                        <div class="small-field">
                            <label for="first_name">First Name</label>
                            <input name="first_name" type="text" id="first_name" required>
                        </div>
                        <div class="small-field">
                            <label for="last_name">Last Name</label>
                            <input name="last_name" type="text" id="last_name" required>
                        </div>
                    </div>
                    <div class="one-field">
                        <label for="email">Email</label>
                        <input name="email" type="email" placeholder="example@gmail.com" id="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="one-field">
                        <label for="password">Password</label>
                        <input name="password" type="password" id="password" required>
                    </div>
                    <div class="one-field">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input name="password_confirmation" type="password" id="password" required>
                    </div>



                    <div class="two-fields buttons-container">
                        <a href="#" class="inverted-button">
                            <small>Already have an account?</small>
                        </a>
                        <button class="normal-button" type="submit">
                            <h4>Sign Up</h4>
                        </button>
                    </div>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    <small style="color: #FF0000; text-align: left">{{ $error }}</small>
                </li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </div>

        </section>
    </div>

@endsection


