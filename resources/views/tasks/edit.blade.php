@extends('components.layout')
@section('title', 'Edit Task')

@section('content')
    <div class="main-section-container">
        <a href="{{ url()->previous() }}" class="back-button">
            <h4><i class="bi bi-arrow-left-short"></i>Back</h4>
        </a>
        <form class="task-form edit-form" method="POST" action="/tasks/{{ $task['id'] }}">
            @csrf
            @method('PATCH')
            <input type="text" name="title" id="title" placeholder="Title..." value="{{ $task['title'] }}" required>
            <textarea type="text" name="description" id="description" placeholder="Description..." required>{{ $task['description'] }}</textarea>

            <div class="two-fields">
                <input type="date" name="due_date" id="due_date" required value="{{ $due_date_only }}">
                <select for="status" name="status" required>
                    <option value="in_process">In processs</option>
                    <option value="completed">Completed</option>
                    <option value="overdue">Overdue</option>
                </select>
            </div>

            <div class="two-fields">
                <button form="delete-form" class="cancel-button" href="/tasks">
                    <h4>Delete</h4>
                </button>
                <button class="normal-button" type="submit">
                    <h4>Update</h4>
                </button>
            </div>
        </form>
    </div>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    <small style="color: #FF0000; text-align: left">{{ $error }}</small>
</li>
            @endforeach
        </ul>
    @endif
    </div>



<form action="/tasks/{{ $task['id'] }}" method="POST" style="visibility: hidden;" id="delete-form">
    @csrf
    @method('DELETE')
</form>


@endsection

