@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('Edit label') }}</h1>
    {{ Form::model($label, ['url' => route('labels.auth.update', $label),'class' => 'w-50', 'method' => 'PATCH']) }}
        @include('label.form')
        {{ Form::submit(__('Save'), ['class' => 'btn btn-primary mt-3']) }}
    {{ Form::close() }}
@endsection
