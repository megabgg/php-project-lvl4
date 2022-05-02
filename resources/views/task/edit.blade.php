@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('Edit task') }}</h1>
    {{ Form::model($task, ['url' => route('tasks.auth.update', $task),'class' => 'w-50', 'method' => 'PATCH']) }}
        @include('task.form')
        {{ Form::submit(__('Save'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}
@endsection
