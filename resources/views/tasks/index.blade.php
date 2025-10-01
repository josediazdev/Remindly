@extends('components.layout')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4 center-center-container">
    <div class="row">
        <div class="col-12">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4 fade-in">
                <div>
                    <h1 class="display-5 fw-bold text-light mb-2">Task Dashboard</h1>
                    <p class="text-secondary mb-0">Manage your tasks efficiently</p>
                </div>
                <a href="/tasks/create" class="btn btn-primary btn-lg glow-on-hover">
                    <i class="bi bi-plus-circle me-2"></i>New Task
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card stats-card border-0 glow-on-hover">
                        <div class="card-body text-center">
                            <div class="stats-icon mb-2">
                                <i class="bi bi-list-task display-4 text-info"></i>
                            </div>
                            <h3 class="text-light mb-1">{{ $tasks->count() }}</h3>
                            <p class="text-muted small mb-0">Total Tasks</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stats-card border-0 glow-on-hover">
                        <div class="card-body text-center">
                            <div class="stats-icon mb-2">
                                <i class="bi bi-clock-history display-4 text-warning"></i>
                            </div>
                            <h3 class="text-light mb-1">
                                @php
                                    $inProgressCount = 0;
                                    foreach($tasks as $task) {
                                        if($task->status === 'in_process') $inProgressCount++;
                                    }
                                @endphp
                                {{ $inProgressCount }}
                            </h3>
                            <p class="text-muted small mb-0">In Progress</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stats-card border-0 glow-on-hover">
                        <div class="card-body text-center">
                            <div class="stats-icon mb-2">
                                <i class="bi bi-check-circle display-4 text-success"></i>
                            </div>
                            <h3 class="text-light mb-1">
                                @php
                                    $completedCount = 0;
                                    foreach($tasks as $task) {
                                        if($task->status === 'completed') $completedCount++;
                                    }
                                @endphp
                                {{ $completedCount }}
                            </h3>
                            <p class="text-muted small mb-0">Completed</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stats-card border-0 glow-on-hover">
                        <div class="card-body text-center">
                            <div class="stats-icon mb-2">
                                <i class="bi bi-exclamation-triangle display-4 text-danger"></i>
                            </div>
                            <h3 class="text-light mb-1">
                                @php
                                    $overdueCount = 0;
                                    foreach($tasks as $task) {
                                        if($task->status === 'overdue') $overdueCount++;
                                    }
                                @endphp
                                {{ $overdueCount }}
                            </h3>
                            <p class="text-muted small mb-0">Overdue</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks Grid -->
            <div class="row g-4">
                @forelse ($tasks as $task)
                    <div class="col-lg-4 col-md-6">
                        <div class="card task-card border-0 h-100 slide-up glow-on-hover {{ $task['status'] }}-task">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                                <div class="task-status-badge">
                                    @if($task['status'] === 'completed')
                                        <span class="badge bg-success rounded-pill">
                                            <i class="bi bi-check-circle me-1"></i>Completed
                                        </span>
                                    @elseif($task['status'] === 'in_process')
                                        <span class="badge bg-warning rounded-pill">
                                            <i class="bi bi-clock me-1"></i>In Progress
                                        </span>
                                    @elseif($task['status'] === 'overdue')
                                        <span class="badge bg-danger rounded-pill">
                                            <i class="bi bi-exclamation-triangle me-1"></i>Overdue
                                        </span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill">
                                            <i class="bi bi-circle me-1"></i>Pending
                                        </span>
                                    @endif
                                </div>
                                <div class="task-actions">
                                    <a href="/tasks/{{ $task['id'] }}/edit" class="btn btn-sm btn-outline-light rounded-circle">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <h5 class="card-title text-light mb-3">{{ $task['title'] }}</h5>
                                <p class="card-text text-secondary mb-3">{{ Str::limit($task['description'], 100) }}</p>
                                
                                <div class="task-meta d-flex align-items-center justify-content-between">
                                    <div class="due-date">
                                        <small class="text-muted">
                                            <i class="bi bi-calendar-event me-1"></i>
                                            Due: {{ $task->due_date->format('M d, Y') }}
                                        </small>
                                    </div>
                                    <div class="priority-indicator">
                                        @if($task->due_date->isPast() && $task['status'] !== 'completed')
                                            <i class="bi bi-exclamation-circle text-danger" title="Overdue"></i>
                                        @elseif($task->due_date->isToday())
                                            <i class="bi bi-clock text-warning" title="Due Today"></i>
                                        @else
                                            <i class="bi bi-calendar-check text-info" title="Upcoming"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer bg-transparent border-0">
                                <div class="progress" style="height: 4px;">
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
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="empty-state">
                                <i class="bi bi-inbox display-1 text-muted mb-4"></i>
                                <h3 class="text-light mb-3">No tasks yet</h3>
                                <p class="text-secondary mb-4">Create your first task to get started with Remindly</p>
                                <a href="/tasks/create" class="btn btn-primary btn-lg">
                                    <i class="bi bi-plus-circle me-2"></i>Create Your First Task
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($tasks->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Tasks pagination">
                        {{ $tasks->links() }}
                    </nav>
                </div>
            @endif
        </div>
    </div>
</div>

<style>

.center-center-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.center-center-container .row {
    margin: 0 auto;
}
.stats-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-elevated);
}

.task-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.task-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: var(--glass-border);
    transition: all 0.3s ease;
}

.task-card.completed-task::before {
    background: linear-gradient(180deg, var(--success), rgba(0, 255, 136, 0.3));
}

.task-card.in_process-task::before {
    background: linear-gradient(180deg, var(--warning), rgba(255, 183, 0, 0.3));
}

.task-card.overdue-task::before {
    background: linear-gradient(180deg, var(--danger), rgba(255, 71, 87, 0.3));
}

.task-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-elevated);
    border-color: var(--neon-blue);
}

.task-card:hover::before {
    width: 6px;
    box-shadow: 0 0 10px currentColor;
}

.empty-state {
    max-width: 400px;
    margin: 0 auto;
}

/* Pagination Styles for Simple Paginate */
.pagination {
    justify-content: center;
}

.pagination .page-link {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    color: var(--text-secondary);
    backdrop-filter: blur(10px);
    border-radius: 8px;
    margin: 0 4px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: var(--neon-blue);
    border-color: var(--neon-blue);
    color: white;
    box-shadow: 0 0 15px rgba(0, 212, 255, 0.3);
    transform: translateY(-2px);
}

.pagination .page-item.active .page-link {
    background: var(--neon-blue);
    border-color: var(--neon-blue);
    color: white;
    box-shadow: 0 0 15px rgba(0, 212, 255, 0.3);
}

.pagination .page-item.disabled .page-link {
    background: rgba(255, 255, 255, 0.02);
    border-color: rgba(255, 255, 255, 0.1);
    color: var(--text-muted);
}
</style>
@endsection

