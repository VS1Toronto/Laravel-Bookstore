<!-- This is lifted directly from Laravel Collective at url https://laravelcollective.com/docs/master/html -->
<!-- -->
<!-- Lifted from section     Calling A Custom Form Component - Registering A Custom Component -->
<!-- -->
<!-- Form::text     has been changed to     Form::textarea -->
<!-- -->
<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>