@extends('components.layout')
@section('title', 'Profile')

@section('content')


    <div class="main-section-container">

        <div class="section-container profile-information">
            <h3 style="color: #151515; text-align: left; text-decoration: underline;">Profile Information</h3>
            <small style="color: #151515; text-align: left">Full Name:</small>
            <p style="color: #151515; text-align: left">{{ $user['first_name'] }} {{ $user['last_name'] }}</p>

            <form class="profile-form" action="/profile" method="POST">
                @csrf
                <label for="email"><small style="color: #151515; text-align: left">Email</small></label>
                <input name="email" type="email" id="email" value="{{ $user['email'] }}" required>
                <label for="current_password"><small style="color: #151515; text-align: left">Current Password</small></label>
                <input name="current_password" type="password" id="current_password" required>
                @error('current_password')
                    <small style="color: #FF0000; text-align: left">{{ $message }}</small>
                @enderror
                <small style="color: #151515; text-align: left">To update your profile’s email you need to insert your password</small>
                <button style="color: #FFF" class="normal-button" type="submit">
                    <small>Save</small>
                </button>
            </form>

        </div>

        <div class="section-container update-password">
            <form class="profile-form" method="POST" action="/profile">
                @csrf
                @method('PATCH')

                <label for="current_password"><small style="color: #151515; text-align: left">Current Password</small></label>
                <input name="current_password" type="password" id="current_password" required>

                <div class="one-field">
                    <label for="password"><small style="color: #151515; text-align: left">New Password</small></label>
                    <input name="password" type="password" id="password" required>
                @error('password')
                    <small style="color: #FF0000; text-align: left">{{ $message }}</small>
                @enderror
                </div>
                <div class="one-field">
                    <label for="password_confirmation"><small style="color: #151515; text-align: left">Password Confirmation</small></label>
                    <input name="password_confirmation" type="password" id="password" required>
                </div>
                <button style="color: #FFF" class="normal-button" type="submit">
                    <small>Update</small>
                </button>
            </form>
        </div>


        <div class="section-container delete-account">
            <small style="color: #151515; text-align: left">Once your account is deleted, all your data is permanently deleted.</small>
            <button form="delete-form" class="cancel-button" type="submit">
                <small>Delete account</small>
            </button>
        </div>
    </div>


    <form action="/profile" method="POST" style="visibility: hidden;" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

@endsection


