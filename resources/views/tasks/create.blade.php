@extends('components.layout')
@section('title', 'Create Task')

@section('content')
    <div class="main-section-container">
        <form class="task-form" method="POST" action="/tasks">
            @csrf
            <input type="text" name="title" id="title" placeholder="Title..." required>
            <textarea type="text" name="description" id="description" placeholder="Description..." required></textarea>
            <input type="date" name="due_date" id="due_date" required>

            <div class="two-fields">
                <a class="cancel-button" href="/tasks">
                    <h4>Cancel</h4>
                </a>
                <button class="normal-button" type="submit">
                    <h4>Create</h4>
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
@endsection



