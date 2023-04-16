@error($error)
    <div role="alert" class="invalid-feedback">{{ $message }}</div>
@enderror

@push('script')
    <script>
        $('form').on('change', function(event) {
            // Get the input element that has changed
            const input = event.target;

            // Remove any validation errors on this input
            $(input).removeClass('is-invalid');
            $(input).siblings('.invalid-feedback').remove();
        });
    </script>
@endpush
