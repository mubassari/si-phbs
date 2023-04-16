@error($error)
    <div role="alert" class="invalid-feedback">{{ $message }}</div>
@enderror

@push('script')
    <script>
        $('form').on('change', function() {
            // Remove any validation errors
            $(this).find('.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback').remove();
        });
    </script>
@endpush
