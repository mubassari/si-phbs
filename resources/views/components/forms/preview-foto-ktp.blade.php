@push('script')
    <script>
        $('#foto_ktp').on('change', function(event) {
            let filenames = [];
            let image = document.getElementById('foto_ktp');
            for (let i in image.files) {
                if (image.files.hasOwnProperty(i)) {
                    filenames.push(image.files[i].name);
                }
            }
            $(this).next('.custom-file-label').addClass("selected").
            html(filenames.join(', '));

            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.classList.remove("invisible");
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endpush