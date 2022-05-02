@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{  __('Task statuses') }}</h1>
    @auth
        <a href="{{ route('task_statuses.auth.create') }}" class="btn btn-primary">{{  __('Create task status') }}</a>
    @endauth
    <table class="table mt-2">
        <thead>
        <tr>
            <th>{{  __('ID') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Created date') }}</th>
            @auth
                <th>{{ __('Actions') }}</th>
            @endauth
        </tr>
        </thead>

        <tbody>

        @foreach($taskStatuses as $taskStatus)

            <tr>
                <td>{{ $taskStatus->id }}</td>
                <td>{{ $taskStatus->name }}</td>
                <td>{{ $taskStatus->created_at }}</td>
                @auth
                    <td>
                        <a class="text-danger text-decoration-none"
                           href="{{ route('task_statuses.auth.destroy', $taskStatus) }}"
                           data-confirm="{{  __('Are you sure?') }}" data-method="delete">
                            {{  __('Delete') }} </a>
                        <a class="text-decoration-none" href="{{ route('task_statuses.auth.edit', $taskStatus) }}">
                            {{  __('Edit') }} </a>
                    </td>
                @endauth
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
