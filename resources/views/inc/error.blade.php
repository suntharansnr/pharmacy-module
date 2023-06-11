@error($field_name)
<div class="text-danger" style="{{isset($style) ? $style : ''}}">
  {{ $message }}
</div>
@enderror
