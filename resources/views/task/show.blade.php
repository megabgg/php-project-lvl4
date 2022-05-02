@extends('layouts.app')

@section('content')
    <main class="container py-4">
        <h1 class="mb-5">
            {{ $task->name }} <a
                href="{{ route('tasks.auth.edit', $task) }}">⚙</a>
        </h1>
        <p>{{ __('Description') }}: {{ $task->description }}</p>
        <p>{{ __('Status') }}: {{ $task->status->name }}</p>
        <p>{{ __('Labels') }}:</p>
        <ul>
            @foreach($task->labels as $label)
                <li>{{ $label->name }}</li>
            @endforeach
        </ul>
    </main>

@endsection('content')
