@extends('components.layout')
@section('title', 'Home')

@section('content')
<div class="container-fluid px-0">
    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center justify-content-center min-vh-100 fade-in">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
                    <div class="hero-content slide-up">
                        <!-- Logo and Brand -->
                        <div class="brand-container mb-4">
                            <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Remindly Logo" class="hero-logo mb-3 glow-on-hover" width="120" height="120">
                            <h1 class="display-2 fw-bold text-light mb-3" style="background: linear-gradient(45deg, #00d4ff, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: none;">Remindly</h1>
                            <p class="lead text-light mb-4" style="color: #e2e8f0 !important;">Your Ultimate Task Management Solution</p>
                        </div>

                        <!-- Hero Text -->
                        <div class="hero-text mb-5">
                            <h2 class="display-4 fw-light mb-4">
                                <span class="text-gradient">From Chaos to Control.</span><br>
                                Organize your world <span class="text-info">in minutes.</span><br>
                                <em class="text-muted">Achieve more</em> with <strong class="logo-text">Remindly</strong>.
                            </h2>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="hero-actions">
                            <a href="/register" class="btn btn-primary btn-lg me-3 mb-3 glow-on-hover">
                                <i class="bi bi-rocket-takeoff me-2"></i>Get Started
                            </a>
                            <a href="/login" class="btn btn-outline-light btn-lg mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual text-center slide-up">
                        <!-- Feature Cards Preview -->
                        <div class="feature-preview">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="card feature-card h-100 glow-on-hover">
                                        <div class="card-body text-center">
                                            <div class="feature-icon mb-3">
                                                <i class="bi bi-lightning-charge display-4 text-warning"></i>
                                            </div>
                                            <h5 class="card-title text-light">Lightning Fast</h5>
                                            <p class="card-text text-muted small">Create and manage tasks in seconds</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card feature-card h-100 glow-on-hover">
                                        <div class="card-body text-center">
                                            <div class="feature-icon mb-3">
                                                <i class="bi bi-shield-check display-4 text-success"></i>
                                            </div>
                                            <h5 class="card-title text-light">Secure & Reliable</h5>
                                            <p class="card-text text-muted small">Your data is safe and always accessible</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card feature-card h-100 glow-on-hover">
                                        <div class="card-body text-center">
                                            <div class="feature-icon mb-3">
                                                <i class="bi bi-phone display-4 text-info"></i>
                                            </div>
                                            <h5 class="card-title text-light">Mobile Ready</h5>
                                            <p class="card-text text-muted small">Access your tasks anywhere, anytime</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card feature-card h-100 glow-on-hover">
                                        <div class="card-body text-center">
                                            <div class="feature-icon mb-3">
                                                <i class="bi bi-graph-up display-4 text-primary"></i>
                                            </div>
                                            <h5 class="card-title text-light">Track Progress</h5>
                                            <p class="card-text text-muted small">Monitor your productivity and growth</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container-fluid">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold mb-3" style="color: #ffffff !important; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);">Why Choose Remindly?</h2>
                    <p class="lead text-secondary">Experience the future of task management</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon-large mb-4">
                            <i class="bi bi-cpu display-1 text-primary"></i>
                        </div>
                        <h4 class="text-light mb-3">Smart Organization</h4>
                        <p class="text-secondary">AI-powered task categorization and priority management</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon-large mb-4">
                            <i class="bi bi-clock-history display-1 text-success"></i>
                        </div>
                        <h4 class="text-light mb-3">Time Tracking</h4>
                        <p class="text-secondary">Monitor time spent on tasks and improve productivity</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon-large mb-4">
                            <i class="bi bi-people display-1 text-warning"></i>
                        </div>
                        <h4 class="text-light mb-3">Team Collaboration</h4>
                        <p class="text-secondary">Share tasks and collaborate with your team seamlessly</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.hero-section {
    background: var(--primary-bg);
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 80%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.hero-logo {
    filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.3));
    transition: all 0.3s ease;
}

.text-gradient {
    background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.feature-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0, 212, 255, 0.2);
}

.features-section {
    background: var(--secondary-bg);
}

.feature-icon-large {
    transition: all 0.3s ease;
}

.feature-icon-large:hover {
    transform: scale(1.1);
}
</style>
@endsection
