@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('contents')
<div class="px-6 py-4">
    <h1 class="text-2xl font-bold mb-4">Edit Sub Kriteria</h1>
    <hr class="mb-6">

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Sub Kriteria</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Edit informasi sub kriteria sesuai dengan kebutuhan.</p>
        </div>
        <div class="border-t border-gray-200">
            <form action="{{ route('admin/subkriteria/update', $subKriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6">
                    <label for="kriteria_id" class="block font-medium">Kriteria</label>
                    <select name="kriteria_id" id="kriteria_id" class="border rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" required>
                        @foreach ($kriterias as $kriteria)
                            <option value="{{ $kriteria->id }}" {{ $subKriteria->kriteria_id == $kriteria->id ? 'selected' : '' }}>{{ $kriteria->nama_kriteria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="p-6">
                    <label for="deskripsi" class="block font-medium">Deskripsi Sub Kriteria</label>
                    <input type="text" name="deskripsi" id="deskripsi" value="{{ $subKriteria->deskripsi }}" class="border rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="p-6">
                    <label for="nilai" class="block font-medium">Nilai</label>
                    <input type="number" name="nilai" id="nilai" value="{{ $subKriteria->nilai }}" class="border rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="p-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md px-4 py-2">Simpan Perubahan</button>
                    <a href="{{ route('admin/subkriteria') }}" class="text-blue-500 hover:underline mt-2 block">Kembali ke Daftar Sub Kriteria</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
