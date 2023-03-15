@push('style')
    <link href="{{ asset('assets/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
    <style>
        @media (max-width:768px){
            .picker__header .picker__select--year{
                display: block;
                margin: auto;
                width: 80px;
                margin-bottom: 5px;
                text-align: center;
            }
            .picker__header .picker__select--month{
                display: block;
                margin: auto;
                width: 120px;
                text-align: center;
            }
        }
    </style>
@endpush
<div class="row mb-3">
    <label for="tanggal_lahir" class="col-sm-4">{{ $label }}</label>
    <div class="col-sm-8">
        <input type="text" {{ $attributes }} name="{{ $name }}" data-value="{{ old($name) }}" value="{{ $itemValue ?? '' }}" 
        class="form-control datepicker @error($name) is-invalid @enderror" placeholder="Hari Bulan Tahun"/>
        <x-events.error-message :error="$name" />
    </div>
</div>

@push('script')
    <script src="{{ asset('assets/plugins/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script>
        $('.datepicker').pickadate({
            monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            // weekdaysShort: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'],
            weekdaysShort: ['M', 'S', 'S', 'R', 'K', "J", 'S'],
            formatSubmit: 'yyyy-mm-dd',
            format:'dd-mm-yyyy',
			selectMonths: true,
			selectYears: true,
			// selectYears: 999,
            min: new Date('{{ $min }}'),
            max: new Date('{{ $max }}'),
            today: '',
            clear: '',
            close: 'Tutup',
		})
    </script>
@endpush