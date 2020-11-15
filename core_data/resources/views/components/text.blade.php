<!-- This is lifted directly from Laravel Collective at url https://laravelcollective.com/docs/master/html -->
<!-- -->
<!-- Lifted from section     Calling A Custom Form Component - Registering A Custom Component -->
<!-- -->
<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>