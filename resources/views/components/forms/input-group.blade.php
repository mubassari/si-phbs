<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-4 col-form-label">{{ $label }}</label>
    <div class="col-sm-8">
        <input {{ $attributes }} name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" placeholder="{{ $plc ?? '' }}" value="{{ old($name, ($itemValue ?? '')) }}">
        <x-events.error-message :error="$name" />
    </div>
</div>