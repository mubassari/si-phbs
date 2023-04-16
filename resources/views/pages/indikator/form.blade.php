<x-forms.input-group label="Judul" name="judul" id="judul" type="text" itemValue="{{ $indikator->judul ?? '' }}" />
<x-forms.summernote label="Isi" name="isi" id="isi" itemValue="{{ $indikator->isi ?? '' }}" />
<x-forms.input-image label="Foto" name="foto" :src="$user->path_foto ?? null" formName="indikator" />
<a class="btn btn-secondary text-white" href="{{ route('indikator.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
