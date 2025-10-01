@extends('components.layout')
@section('title', 'Sign up')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card auth-card border-0 shadow-lg fade-in">
                <div class="card-body p-5">
                    <!-- Logo and Brand -->
                    <div class="text-center mb-5">
                        <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Remindly Logo" class="auth-logo mb-3 glow-on-hover" width="80" height="80">
                        <h1 class="logo-text mb-2">Remindly</h1>
                        <p class="text-secondary">Join the future of task management</p>
                    </div>

                    <!-- Registration Form -->
                    <form action="/register" method="POST" class="slide-up">
                        @csrf
                        
                        <!-- Name Fields -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">
                                    <i class="bi bi-person me-2"></i>First Name
                                </label>
                                <input 
                                    name="first_name" 
                                    type="text" 
                                    class="form-control form-control-lg @error('first_name') is-invalid @enderror" 
                                    id="first_name" 
                                    placeholder="Enter your first name"
                                    value="{{ old('first_name') }}"
                                    required
                                >
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">
                                    <i class="bi bi-person me-2"></i>Last Name
                                </label>
                                <input 
                                    name="last_name" 
                                    type="text" 
                                    class="form-control form-control-lg @error('last_name') is-invalid @enderror" 
                                    id="last_name" 
                                    placeholder="Enter your last name"
                                    value="{{ old('last_name') }}"
                                    required
                                >
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-2"></i>Email Address
                            </label>
                            <input 
                                name="email" 
                                type="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                id="email" 
                                placeholder="Enter your email address"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Fields -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    <i class="bi bi-lock me-2"></i>Password
                                </label>
                                <div class="position-relative">
                                    <input 
                                        name="password" 
                                        type="password" 
                                        class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                        id="password" 
                                        placeholder="Create a password"
                                        required
                                    >
                                    <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" onclick="togglePassword('password', 'toggleIcon1')">
                                        <i class="bi bi-eye" id="toggleIcon1"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">
                                    <i class="bi bi-lock-fill me-2"></i>Confirm Password
                                </label>
                                <div class="position-relative">
                                    <input 
                                        name="password_confirmation" 
                                        type="password" 
                                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" 
                                        id="password_confirmation" 
                                        placeholder="Confirm your password"
                                        required
                                    >
                                    <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                        <i class="bi bi-eye" id="toggleIcon2"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label text-secondary" for="terms">
                                    I agree to the <a href="#" class="text-info text-decoration-none">Terms of Service</a> and 
                                    <a href="#" class="text-info text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-4 glow-on-hover">
                            <i class="bi bi-rocket-takeoff me-2"></i>Create Account
                        </button>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-secondary mb-0">
                                Already have an account? 
                                <a href="/login" class="text-info text-decoration-none fw-semibold">Sign in here</a>
                            </p>
                        </div>
                    </form>

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="alert alert-danger mt-4 fade-in" role="alert">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <strong>Please fix the following errors:</strong>
                            </div>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li class="small">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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

.alert-danger {
    background: rgba(255, 71, 87, 0.1);
    border: 1px solid rgba(255, 71, 87, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
}

@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }
    
    .auth-logo {
        width: 60px !important;
        height: 60px !important;
    }
    
    .row.mb-4 .col-md-6:first-child {
        margin-bottom: 1rem;
    }
}
</style>

<script>
function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);
    
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


