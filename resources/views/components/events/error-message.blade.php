@error($error)
    <div role="alert" class="invalid-feedback">{{ $message }}</div>
@enderror

@push('script')
    <script>
        $('form').on('change input', function(event) {
            // Get the input element that has changed
            const input = event.target;

            // Remove any validation errors on this input
            $(input).siblings('.invalid-feedback').fadeOut('fast', function() {
                $(input).removeClass('is-invalid');
                $(this).remove();
            });
        });
    </script>
@endpush
