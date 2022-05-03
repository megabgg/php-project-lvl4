<div class="form-group mb-3">
    {{ Form::label('name', __('Name')) }}<br>
    {{ Form::text('name', null, ['class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) }}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('description', __('Description')) }}<br>
    {{ Form::textarea('description', null, ['class' => 'form-control ' . ( $errors->has('description') ? ' is-invalid' : '' )]) }}
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('status_id', __('Status')) }}<br>
    {{ Form::select('status_id', $taskStatuses, null, ['class' => 'form-select me-2 ' . ( $errors->has('status_id') ? ' is-invalid' : '' )]) }}
    @error('status_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('assigned_to_id', __('Executor')) }}<br>
    {{ Form::select('assigned_to_id', $users, null, ['class' => 'form-select me-2 ' . ( $errors->has('assigned_to_id') ? ' is-invalid' : '' )]) }}
    @error('assigned_to_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    {{ Form::label('labels', __('Labels')) }}<br>
    {{ Form::select('labels[]', $labels, null, ['class' => 'form-select me-2 ' . ( $errors->has('labels') ? ' is-invalid' : '' ), 'multiple' => '']) }}
    @error('labels')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
