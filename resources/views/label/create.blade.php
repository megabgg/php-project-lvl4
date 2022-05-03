@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('Create label') }}</h1>
    {{ Form::model($label, ['url' => route('labels.auth.store'), 'class' => 'w-50']) }}
        @include('label.form')
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}
@endsection
