@extends('components.layout')
@section('title', 'Dashboard')

@section('content')

    <div class="main-section-container">
        <div class="main-tasks-container">
            <a href="/tasks/create" class="new-task-button">
                <h4>New Task <i class="bi bi-file-earmark-plus-fill"></i></i></i></h4>
            </a>
            @foreach ($tasks as $task)
                <div class="card-task-container {{ $task['status'] }}">
                    <section class="task-content">
                        <p>{{ $task['title'] }}</p>
                        <small class="task-date"><i class="bi bi-calendar-date"></i> {{ $task->due_date->format('M/d') }}</small>                        <small>{{ $task['description'] }}</small>
                    </section>
                    <a class="edit-task-button" href="/tasks/{{ $task['id'] }}/edit"><i class="bi bi-pencil-square"></i></a>
                </div>
            @endforeach
            <div class="paginator-container">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>

@endsection

