@extends('components.layout')
@section('title', 'Create Task')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Header -->
            <div class="text-center mb-5 fade-in">
                <h1 class="display-5 fw-bold text-light mb-3">Create New Task</h1>
                <p class="text-secondary">Add a new task to your productivity workflow</p>
            </div>

            <!-- Task Form Card -->
            <div class="card task-form-card border-0 shadow-lg slide-up">
                <div class="card-body p-5">
                    <form method="POST" action="/tasks">
                        @csrf
                        
                        <!-- Task Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label">
                                <i class="bi bi-card-text me-2"></i>Task Title
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                placeholder="Enter a descriptive title for your task..."
                                value="{{ old('title') }}"
                                required
                            >
                            @error('title')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Task Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label">
                                <i class="bi bi-file-text me-2"></i>Description
                            </label>
                            <textarea 
                                name="description" 
                                id="description" 
                                class="form-control @error('description') is-invalid @enderror" 
                                rows="6"
                                placeholder="Describe your task in detail. What needs to be accomplished?"
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Due Date and Priority -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="due_date" class="form-label">
                                    <i class="bi bi-calendar-event me-2"></i>Due Date
                                </label>
                                <input 
                                    type="date" 
                                    name="due_date" 
                                    id="due_date" 
                                    class="form-control form-control-lg @error('due_date') is-invalid @enderror"
                                    value="{{ old('due_date') }}"
                                    min="{{ date('Y-m-d') }}"
                                    required
                                >
                                @error('due_date')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">
                                    <i class="bi bi-flag me-2"></i>Initial Status
                                </label>
                                <select 
                                    name="status" 
                                    id="status" 
                                    class="form-select form-control-lg @error('status') is-invalid @enderror"
                                >
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_process" {{ old('status') == 'in_process' ? 'selected' : '' }}>In Progress</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Task Tips -->
                        <div class="alert alert-info mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-lightbulb me-2"></i>
                                <strong>Pro Tips:</strong>
                            </div>
                            <ul class="mb-0 mt-2 ps-3">
                                <li class="small">Use clear, actionable titles</li>
                                <li class="small">Break down complex tasks into smaller steps</li>
                                <li class="small">Set realistic deadlines to maintain momentum</li>
                            </ul>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="/tasks" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-left me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg glow-on-hover">
                                <i class="bi bi-plus-circle me-2"></i>Create Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>

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

<style>
.task-form-card {
    background: var(--glass-bg);
    backdrop-filter: blur(30px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    box-shadow: var(--shadow-elevated);
}

.form-control, .form-select {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--glass-border);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
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
    border-radius: 12px;
}

.alert-danger {
    background: rgba(255, 71, 87, 0.1);
    border: 1px solid rgba(255, 71, 87, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    border-radius: 12px;
}

.btn-outline-secondary {
    border-color: var(--glass-border);
    color: var(--text-secondary);
    backdrop-filter: blur(10px);
}

.btn-outline-secondary:hover {
    background: var(--glass-bg);
    border-color: var(--text-secondary);
    color: var(--text-primary);
}

@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }
    
    .d-flex.gap-3 {
        flex-direction: column;
    }
    
    .d-flex.gap-3 .btn {
        width: 100%;
    }
}
</style>
@endsection



