@extends('components.layout')
@section('title', 'Edit Task')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Header -->
            <div class="d-flex align-items-center mb-5 fade-in">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-4">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
                <div>
                    <h1 class="display-5 fw-bold text-light mb-2">Edit Task</h1>
                    <p class="text-secondary mb-0">Update your task details</p>
                </div>
            </div>

            <!-- Task Form Card -->
            <div class="card task-form-card border-0 shadow-lg slide-up">
                <div class="card-body p-5">
                    <form method="POST" action="/tasks/{{ $task['id'] }}">
                        @csrf
                        @method('PATCH')
                        
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
                                value="{{ old('title', $task['title']) }}"
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
                            >{{ old('description', $task['description']) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Due Date and Status -->
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
                                    value="{{ old('due_date', $due_date_only) }}"
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
                                    <i class="bi bi-flag me-2"></i>Task Status
                                </label>
                                <select 
                                    name="status" 
                                    id="status" 
                                    class="form-select form-control-lg @error('status') is-invalid @enderror"
                                    required
                                >
                                    <option value="pending" {{ old('status', $task['status']) == 'pending' ? 'selected' : '' }}>
                                        <i class="bi bi-circle"></i> Pending
                                    </option>
                                    <option value="in_process" {{ old('status', $task['status']) == 'in_process' ? 'selected' : '' }}>
                                        <i class="bi bi-clock"></i> In Progress
                                    </option>
                                    <option value="completed" {{ old('status', $task['status']) == 'completed' ? 'selected' : '' }}>
                                        <i class="bi bi-check-circle"></i> Completed
                                    </option>
                                    <option value="overdue" {{ old('status', $task['status']) == 'overdue' ? 'selected' : '' }}>
                                        <i class="bi bi-exclamation-triangle"></i> Overdue
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Task Progress Indicator -->
                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-graph-up me-2"></i>Current Progress
                            </label>
                            <div class="progress mb-2" style="height: 8px;">
                                @if($task['status'] === 'completed')
                                    <div class="progress-bar bg-success" style="width: 100%"></div>
                                @elseif($task['status'] === 'in_process')
                                    <div class="progress-bar bg-warning" style="width: 60%"></div>
                                @elseif($task['status'] === 'overdue')
                                    <div class="progress-bar bg-danger" style="width: 30%"></div>
                                @else
                                    <div class="progress-bar bg-secondary" style="width: 10%"></div>
                                @endif
                            </div>
                            <small class="text-muted">
                                Status: 
                                @if($task['status'] === 'completed')
                                    <span class="text-success">Task Completed</span>
                                @elseif($task['status'] === 'in_process')
                                    <span class="text-warning">Work in Progress</span>
                                @elseif($task['status'] === 'overdue')
                                    <span class="text-danger">Past Due Date</span>
                                @else
                                    <span class="text-secondary">Not Started</span>
                                @endif
                            </small>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex gap-3 justify-content-between">
                            <button 
                                type="button" 
                                class="btn btn-danger btn-lg" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal"
                            >
                                <i class="bi bi-trash me-2"></i>Delete Task
                            </button>
                            <div class="d-flex gap-3">
                                <a href="/tasks" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg glow-on-hover">
                                    <i class="bi bi-check-circle me-2"></i>Update Task
                                </button>
                            </div>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle me-2 text-danger"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-secondary mb-3">Are you sure you want to delete this task?</p>
                <div class="alert alert-warning" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>This action cannot be undone!</strong>
                    </div>
                    <p class="mb-0 mt-2 small">The task "{{ $task['title'] }}" will be permanently removed from your account.</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Cancel
                </button>
                <form action="/tasks/{{ $task['id'] }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>Delete Task
                    </button>
                </form>
            </div>
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

.alert-danger {
    background: rgba(255, 71, 87, 0.1);
    border: 1px solid rgba(255, 71, 87, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    border-radius: 12px;
}

.alert-warning {
    background: rgba(255, 183, 0, 0.1);
    border: 1px solid rgba(255, 183, 0, 0.3);
    color: var(--text-primary);
    backdrop-filter: blur(10px);
    border-radius: 8px;
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

.delete-modal .modal-content {
    background: var(--glass-bg);
    backdrop-filter: blur(30px);
    border: 1px solid var(--glass-border);
    border-radius: 15px;
}

.progress {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
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
    
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
@endsection

