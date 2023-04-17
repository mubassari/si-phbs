<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-4 col-form-label">{{ $label }}</label>
    <div class="col-sm-8">
        <div class="mb-3 text-center" id="preview">
            <img src="{{ !isset($old) ? old($name, $src ?? asset('img/foto-' . $formName . '/default.png')) : $src }}"
                class="img img-thumbnail" width="{{ $width ?? '180px' }}" id="foto-{{ $formName }}">
        </div>
        <div class="custom-file">
            <input type="file" name="{{ $name }}" {{ $attributes }}
                class="custom-file-input @error($name) is-invalid @enderror" id="{{ $name }}"
                accept="image/jpeg,image/png,image/jpg">
            <label class="custom-file-label">Pilih Foto</label>
            <x-events.error-message error="{{ $name }}" />
        </div>
    </div>
</div>


@push('script')
    <script>
        $('#{{ $name }}').on('change', function(event) {
            let filenames = [];
            let image = $('#{{ $name }}')[0];
            $.each(image.files, function(index, file) {
                filenames.push(file.name);
            });
            $(this).next('.custom-file-label').addClass("selected").html(filenames.join(', '));

            let reader = new FileReader();
            reader.onload = function() {
                let preview = $('#preview img:first');
                if (preview.length > 0) {
                    preview[0].src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        });
        $("#foto-{{ $formName }}").click(function() {
            $("#{{ $name }}").click();
        });
    </script>
@endpush
