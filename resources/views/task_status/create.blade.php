@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('Create task status') }}</h1>
    {{ Form::model($taskStatus, ['url' => route('task_statuses.auth.store'), 'class' => 'w-50']) }}
        @include('task_status.form')
        {{ Form::submit( __('Save'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}
@endsection
