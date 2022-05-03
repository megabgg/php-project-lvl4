<div class="form-group mb-3">
    {{ Form::label('name', __('Name')) }}<br>
    {{ Form::text('name', null, ['class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) }}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
