@extends('components.layout')
@section('title', 'Home')

@section('content')
    <div class="main-section-container">
        <section class="panel-hero-container">
            <div class="main-logo-container">
                <img class="logo-img" src="{{ Vite::asset('resources/images/logo.webp') }}">
                <h1 class="logo-text">Remindly</h1>
            </div>

            <div class="main-text-container">
                <h3>
                    <span class="text-underline">From Chaos to Control.</span><br>
                    Organize your world <span class="text-blue">in minutes.</span><br>
                    <span class="text-italic">Achieve more</span> with <span class="text-bold">Remindly</span>.
                </h3>
            </div>

        </section>
    </div>
@endsection
