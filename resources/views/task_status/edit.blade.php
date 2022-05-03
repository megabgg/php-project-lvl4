@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('Edit task status') }}</h1>
    {{ Form::model($taskStatus, ['url' => route('task_statuses.auth.update', $taskStatus),'class' => 'w-50', 'method' => 'PATCH']) }}
        @include('task_status.form')
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}
@endsection
