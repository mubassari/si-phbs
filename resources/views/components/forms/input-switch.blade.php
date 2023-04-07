<div class="form-group">
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="{{ $name }}" name="{{ $name }}"
                @if ($itemValue) checked @endif>
            <label class="custom-control-label" for="{{ $name }}">{{ $label }}</label>
        </div>
    </div>
</div>
