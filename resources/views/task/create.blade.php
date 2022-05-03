@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('Create task') }}</h1>
    {{ Form::model($task, ['url' => route('tasks.auth.store'), 'class' => 'w-50']) }}
        @include('task.form')
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}
@endsection
