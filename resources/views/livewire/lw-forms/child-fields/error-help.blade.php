@error(sprintf('%s.%s', $field->key , $child_field->name))
<div class="invalid-feedback d-block" role="alert">
    <strong>{{ $this->errorMessage($message) }}</strong>
</div>
@elseif($child_field->help)
 <small class="form-text text-muted">{{ $child_field->help }}</small>
@enderror
