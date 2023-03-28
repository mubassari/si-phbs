<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-4 col-form-label">{{ $label }}</label>
    <div class="col-sm-8">
        <div class="form-group">
            <div class="form-check mr-4">
                <input class="form-check-input" value="TRUE" type="radio" name="{{ $name }}" {{ $itemValue ? 'checked' : '' }}>
                <label class="form-check-label"><i class='icon-copy fa fa-check'></i></label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="FALSE" type="radio" name="{{ $name }}" {{ $itemValue ? '' : 'checked' }}>
                <label class="form-check-label"><i class='icon-copy fa fa-exclamation-circle'></i></label>
            </div>
        </div>
    </div>
</div>