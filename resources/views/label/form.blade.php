<div class="form-group mb-3">
    {{ Form::label('name', __('Name')) }}<br>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group mb-3">
    {{ Form::label('description', __('Description')) }}<br>
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>