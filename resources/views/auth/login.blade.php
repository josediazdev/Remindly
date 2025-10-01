@extends('components.layout')
@section('title', 'Log in')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-9">
            <div class="card auth-card border-0 shadow-lg fade-in">
                <div class="card-body p-5">
                    <!-- Logo and Brand -->
                    <div class="text-center mb-5">
                        <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Remindly Logo" class="auth-logo mb-3 glow-on-hover" width="80" height="80">
                        <h1 class="logo-text mb-2">Remindly</h1>
                        <p class="text-secondary">Your ideal Task Manager</p>
                    </div>

                    <!-- Login Form -->
                    <form action="/login" method="POST" class="slide-up">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-2"></i>Email Address
                            </label>
                            <input 
                                name="email" 
                                type="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                id="email" 
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-2"></i>Password
                            </label>
                            <div class="position-relative">
                                <input 
                                    name="password" 
                                    type="password" 
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                    id="password" 
                                    placeholder="Enter your password"
                                    required
                                >
                                <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" onclick="togglePassword()">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label text-secondary" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-decoration-none text-info">
                                <small>Forgot password?</small>
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-4 glow-on-hover">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>

                        <div class="text-center">
                            <p class="text-secondary mb-0">
                                Don't have an account? 
                                <a href="/register" class="text-info text-decoration-none fw-semibold">Sign up here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-card {
    background: var(--glass-bg);
    backdrop-filter: blur(30px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    box-shadow: var(--shadow-elevated);
}

.auth-logo {
    filter: drop-shadow(0 0 15px rgba(0, 212, 255, 0.3));
    transition: all 0.3s ease;
}

.auth-logo:hover {
    filter: drop-shadow(0 0 25px rgba(0, 212, 255, 0.5));
    transform: scale(1.05);
}

.form-control-lg {
    padding: 1rem 1.25rem;
    font-size: 1rem;
    border-radius: 12px;
}

.form-control:focus {
    box-shadow: 0 0 0 0.25rem rgba(0, 212, 255, 0.25);
}

.form-check-input:checked {
    background-color: var(--neon-blue);
    border-color: var(--neon-blue);
}

.btn-link {
    color: var(--text-secondary);
    text-decoration: none;
}

.btn-link:hover {
    color: var(--neon-blue);
}

@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }
    
    .auth-logo {
        width: 60px !important;
        height: 60px !important;
    }
}
</style>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.className = 'bi bi-eye-slash';
    } else {
        passwordInput.type = 'password';
        toggleIcon.className = 'bi bi-eye';
    }
}
</script>
@endsection

