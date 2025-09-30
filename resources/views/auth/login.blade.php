@extends('components.layout')
@section('title', 'Log in')

@section('content')

    <div class="main-section-container">
        <section class="panel-hero-container">
            <div class="main-logo-container">
                <img class="logo-img" src="{{ Vite::asset('resources/images/logo.webp') }}">
                <h1 class="logo-text">Remindly</h1>
                <p>Your ideal Task Manager</p>
            </div>

            <div class="form-container">
                <form action="/login" method="POST">
                    @csrf
                    <div class="one-field">
                        <label for="email">Email</label>
                        <input name="email" type="email" placeholder="example@gmail.com" id="email" required>
                        @error('email')
                            <small style="color: #FF0000; text-align: left">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="one-field">
                        <label for="password">Password</label>
                        <input name="password" type="password" id="password" required>
                    </div>
                    <div class="two-fields buttons-container">
                        <a href="#" class="inverted-button">
                            <small>I forgot my password</small>
                        </a>
                        <button class="normal-button" type="submit">
                            <h4>Log In</h4>
                        </button>
                    </div>
                </form>
            </div>

        </section>
    </div>

@endsection

