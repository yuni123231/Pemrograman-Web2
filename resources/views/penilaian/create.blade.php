@extends('layouts.app')

@section('title', 'Tambah Alternatif')

@section('contents')
<div class="container mx-auto">
    <h1 class="font-bold text-2xl mb-4">Tambah Penilaian</h1>
    <hr class="mb-6"/>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Form Tambah Penilaian</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Isi informasi penilaian sesuai dengan kebutuhan.</p>
        </div>
        <div class="border-t border-gray-200">
            <form action="{{ route('admin/penilaian/store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <div>
                    <label for="alternatif_id" class="block text-sm font-medium text-gray-700">Alternatif</label>
                    <select name="alternatif_id" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500" required>
                        @foreach($alternatifs as $alternatif)
                        <option value="{{ $alternatif->id }}">{{ $alternatif->nama_alternatif }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach($kriterias as $kriteria)
                <div class="bg-gray-50 p-4 rounded-md shadow-md">
                    <h3 class="text-lg font-medium text-gray-900">{{ $kriteria->nama_kriteria }}</h3>
                    <input type="hidden" name="penilaian[{{ $loop->index }}][kriteria_id]" value="{{ $kriteria->id }}">

                    <div class="mt-4">
                        <label for="sub_kriteria_{{ $kriteria->id }}" class="block text-sm font-medium text-gray-700">Sub Kriteria</label>
                        <select name="penilaian[{{ $loop->index }}][sub_kriteria_id]" id="sub_kriteria_{{ $kriteria->id }}" class="sub-kriteria block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500" data-kriteria-id="{{ $kriteria->id }}" required>
                            @foreach($kriteria->subKriterias as $subKriteria)
                            <option value="{{ $subKriteria->id }}" data-value="{{ $subKriteria->nilai }}">{{ $subKriteria->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="nilai_{{ $kriteria->id }}" class="block text-sm font-medium text-gray-700">Nilai</label>
                        <input type="number" name="penilaian[{{ $loop->index }}][nilai]" id="nilai_{{ $kriteria->id }}" class="nilai block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500" readonly>
                    </div>
                </div>
                @endforeach

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md px-4 py-2">Simpan</button>
                    <a href="{{ route('admin/penilaian') }}" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-md px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.sub-kriteria').forEach(function(selectElement) {
            // Set nilai sub kriteria pertama saat halaman dimuat
            var kriteriaId = selectElement.getAttribute('data-kriteria-id');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var nilai = selectedOption.getAttribute('data-value');
            document.getElementById('nilai_' + kriteriaId).value = nilai;

            // Update nilai saat sub kriteria berubah
            selectElement.addEventListener('change', function() {
                var kriteriaId = this.getAttribute('data-kriteria-id');
                var selectedOption = this.options[this.selectedIndex];
                var nilai = selectedOption.getAttribute('data-value');
                document.getElementById('nilai_' + kriteriaId).value = nilai;
            });
        });
    });
</script>
@endsection
