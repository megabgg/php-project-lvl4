@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{  __('Tasks') }}</h1>

    <div class="d-flex mb-3">
        <div>
            {!! Form::open(['route' => 'tasks.index', 'method' => 'GET', 'class' => 'form-inline']) !!}
            <div class="row g-1">
                <div class="col">
                    {!! Form::select(
                                    'filter[status_id]',
                                    $taskStatuses,
                                    $filter['status_id'] ?? '',
                                    ['class' => 'form-select me-2', 'placeholder' => __('Status')])
                                !!}
                </div>
                <div class="col">
                    {!! Form::select(
                                    'filter[created_by_id]',
                                    $users,
                                    $filter['created_by_id'] ?? '',
                                    ['class' => 'form-select me-2', 'placeholder' => __('Author')])
                                !!}
                </div>
                <div class="col">

                    {!! Form::select(
                                        'filter[assigned_to_id]',
                                        $users,
                                        $filter['assigned_to_id'] ?? '',
                                        ['class' => 'form-select me-2', 'placeholder' => __('Executor')])
                                !!}                    </div>
                <div class="col">
                    {!! Form::submit(__('Apply'), ['class' => 'btn btn-outline-primary mr-2']) !!}
                </div>

            </div>
            {!! Form::close() !!}

        </div>
        <div class="ms-auto">
        </div>
    </div>

    @auth
        <a href="{{ route('tasks.auth.create') }}" class="btn btn-primary">
            {{  __('Create task') }} </a>
    @endauth
    <table class="table mt-2">
        <thead>
        <tr>
            <th>{{  __('ID') }}</th>
            <th>{{  __('Status') }}</th>
            <th>{{  __('Name') }}</th>
            <th>{{  __('Author') }}</th>
            <th>{{  __('Executor') }}</th>
            <th>{{  __('Created date') }}</th>
            @auth
                <th>{{ __('Actions') }}</th>
            @endauth
        </tr>
        </thead>

        <tbody>

        @foreach($tasks as $task)

            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->status->name }}</td>
                <td><a href="{{ route('tasks.auth.show', $task) }}">{{ $task->name }}</a></td>
                <td>{{ $task->created_by->name }}</td>
                <td>{{ $task->assigned_to->name ?? '' }}</td>
                <td>{{ $task->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        <a class="text-decoration-none" href="{{ route('tasks.auth.edit', $task) }}">
                            {{  __('Edit') }}  </a>
                        @can('delete', $task)
                            <a class="text-danger text-decoration-none"
                               href="{{ route('tasks.auth.destroy', $task) }}"
                               data-confirm="{{  __('Are you sure?') }}" data-method="delete">
                                {{  __('Delete') }} </a>
                        @endcan
                    </td>
                @endauth
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
