<option selected style="display: none;">-- Pilih Kelas --</option>
@foreach ($jurus as $item)
<option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
@endforeach