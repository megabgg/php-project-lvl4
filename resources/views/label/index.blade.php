@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{  __('Labels') }}</h1>
    @auth
        <a href="{{ route('labels.auth.create') }}" class="btn btn-primary">
            {{  __('Create label') }} </a>
    @endauth
    <table class="table mt-2">
        <thead>
        <tr>
            <th>{{  __('ID') }}</th>
            <th>{{  __('Name') }}</th>
            <th>{{  __('Description') }}</th>
            <th>{{  __('Created date') }}</th>
            @auth
                <th>{{ __('Actions') }}</th>
            @endauth
        </tr>
        </thead>

        <tbody>

        @foreach($labels as $label)

            <tr>
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        <a class="text-danger text-decoration-none" href="{{ route('labels.auth.destroy', $label) }}"
                           data-confirm="{{  __('Are you sure?') }}" data-method="delete">
                            {{  __('Delete') }} </a>
                        <a class="text-decoration-none" href="{{ route('labels.auth.edit', $label) }}">
                            {{  __('Edit') }} </a>
                    </td>
                @endauth
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
