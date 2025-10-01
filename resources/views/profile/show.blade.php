@extends('components.layout')
@section('title', 'Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Header -->
            <div class="text-center mb-5 fade-in">
                <h1 class="display-5 fw-bold text-light mb-3">Profile Settings</h1>
                <p class="text-secondary">Manage your account information and preferences</p>
            </div>

            <!-- Profile Information Card -->
            <div class="card profile-card border-0 shadow-lg mb-4 slide-up">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h4 class="text-light mb-0">
                        <i class="bi bi-person-circle me-2"></i>Profile Information
                    </h4>
                </div>
                <div class="card-body p-4">
                    <!-- User Info Display -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="form-label text-secondary">
                                    <i class="bi bi-person me-2"></i>Full Name
                                </label>
                                <p class="text-light h5 mb-0">{{ $user['first_name'] }} {{ $user['last_name'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="form-label text-secondary">
                                    <i class="bi bi-calendar me-2"></i>Member Since
                                </label>
                                <p class="text-light h6 mb-0">{{ $user->created_at->format('F Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Update Email Form -->
                    <form action="/profile" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-2"></i>Email Address
                                </label>
                                <input 
                                    name="email" 
                                    type="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user['email']) }}" 
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="current_password_email" class="form-label">
                                    <i class="bi bi-lock me-2"></i>Current Password
                                </label>
                                <input 
                                    name="current_password" 
                                    type="password" 
                                    id="current_password_email" 
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Confirm password"
                                    required
                                >
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="alert alert-info mb-3" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <small>Enter your current password to update your email address</small>
                        </div>

                        <button type="submit" class="btn btn-primary glow-on-hover">
                            <i class="bi bi-check-circle me-2"></i>Update Email
                        </button>
                    </form>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="card profile-card border-0 shadow-lg mb-4 slide-up">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h4 class="text-light mb-0">
                        <i class="bi bi-shield-lock me-2"></i>Change Password
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="/profile">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="current_password_change" class="form-label">
                                <i class="bi bi-lock me-2"></i>Current Password
                            </label>
                            <input 
                                name="current_password" 
                                type="password" 
                                id="current_password_change" 
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Enter your current password"
                                required
                            >
                            @error('current_password')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    <i class="bi bi-key me-2"></i>New Password
                                </label>
                                <input 
                                    name="password" 
                                    type="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter new password"
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">
                                    <i class="bi bi-key-fill me-2"></i>Confirm New Password
                                </label>
                                <input 
                                    name="password_confirmation" 
                                    type="password" 
                                    id="password_confirmation" 
                                    class="form-control"
                                    placeholder="Confirm new password"
                                    required
                                >
                            </div>
                        </div>

                        <div class="alert alert-warning mb-3" role="alert">
                            <i class="bi bi-shield-exclamation me-2"></i>
                            <small>Choose a strong password with at least 8 characters, including letters, numbers, and symbols</small>
                        </div>

                        <button type="submit" class="btn btn-warning glow-on-hover">
                            <i class="bi bi-shield-check me-2"></i>Update Password
                        </button>
                    </form>
                </div>
            </div>

            <!-- Danger Zone Card -->
            <div class="card danger-card border-0 shadow-lg slide-up">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h4 class="text-danger mb-0">
                        <i class="bi bi-exclamation-triangle me-2"></i>Danger Zone
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-light mb-2">Delete Account</h6>
                            <p class="text-muted mb-0 small">
                                Once your account is deleted, all your data will be permanently removed. 
                                This action cannot be undone.
                            </p>
                        </div>
                        <button 
                            type="button" 
                            class="btn btn-danger ms-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteAccountModal"
                        >
                            <i class="bi bi-trash me-2"></i>Delete Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Confirmation Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger" id="deleteAccountModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>Delete Account
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>This action is irreversible!</strong>
                    </div>
                    <p class="mb-0 small">
                        Deleting your account will permanently remove:
                    </p>
                    <ul class="mt-2 mb-0 small">
                        <li>All your tasks and data</li>
                        <li>Your profile information</li>
                        <li>Access to your account</li>
                    </ul>
                </div>
                <p class="text-secondary">
                    Are you absolutely sure you want to delete your account? 
                    Type <strong>"DELETE"</strong> below to confirm:
                </p>
                <input 
                    type="text" 
                    id="deleteConfirmation" 
                    class="form-control" 
                    placeholder="Type DELETE to confirm"
                    onkeyup="toggleDeleteButton()"
                >
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Cancel
                </button>
                <form action="/profile" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="confirmDeleteBtn" class="btn btn-danger" disabled>
                        <i class="bi bi-trash me-2"></i>Delete My Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.profile-card {
    background: var(--glass-bg);
    backdrop-filter: blur(30px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    box-shadow: var(--shadow-elevated);
}

.danger-card {
    background: rgba(255, 71, 87, 0.05);
    backdrop-filter: blur(30px);
    border: 1px solid rgba(255, 71, 87, 0.2);
    border-radius: 20px;
    box-shadow: var(--shadow-elevated);
}

.info-item {
    padding: 1rem;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 10px;
    border: 1px solid var(--glass-border);
}

.form-control {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--glass-border);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.form-control:focus {
    background: rgba(255, 255, 255, 0.08);
    border-color: var(--neon-blue);
    box-shadow: 0 0 0 0.25rem rgba(0, 212, 255, 0.25);
    color: var(--text-primary);
}

.form-control::placeholder {
    color: var(--text-muted);
}

.form-label {
    color: var(--text-secondary);
    font-weight: 500;
    margin-bottom: 0.75rem;
}

.alert-info {
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid rgba(0, 212, 255, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    border-radius: 8px;
}

.alert-warning {
    background: rgba(255, 183, 0, 0.1);
    border: 1px solid rgba(255, 183, 0, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    border-radius: 8px;
}

.alert-danger {
    background: rgba(255, 71, 87, 0.1);
    border: 1px solid rgba(255, 71, 87, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    border-radius: 8px;
}

.delete-modal .modal-content {
    background: var(--glass-bg);
    backdrop-filter: blur(30px);
    border: 1px solid var(--glass-border);
    border-radius: 15px;
}

@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }
    
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .d-flex.justify-content-between .btn {
        width: 100%;
    }
}
</style>

<script>
function toggleDeleteButton() {
    const input = document.getElementById('deleteConfirmation');
    const button = document.getElementById('confirmDeleteBtn');
    
    if (input.value === 'DELETE') {
        button.disabled = false;
        button.classList.remove('btn-secondary');
        button.classList.add('btn-danger');
    } else {
        button.disabled = true;
        button.classList.remove('btn-danger');
        button.classList.add('btn-secondary');
    }
}
</script>
@endsection


