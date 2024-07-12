@extends('layouts.app')

@section('title', 'Tambah Kriteria')

@section('contents')
    <div class="container mx-auto">
        <h1 class="font-bold text-2xl mb-4">Tambah Sub Kriteria</h1>
        <hr class="mb-6"/>

        <div class="border-b border-gray-900/10 pb-12">
            <form action="{{ route('admin/subkriteria/store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col">
                    <label for="kriteria_id" class="font-medium">Kriteria</label>
                    <select name="kriteria_id" id="kriteria_id" class="border rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300">
                        @foreach ($kriterias as $kriteria)
                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="deskripsi" class="font-medium">Deskripsi Sub Kriteria</label>
                    <input type="text" name="deskripsi" id="deskripsi" placeholder="Nama Sub Kriteria" class="border rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="flex flex-col">
                    <label for="nilai" class="font-medium">Nilai</label>
                    <input type="number" name="nilai" id="nilai" placeholder="Nilai" class="border rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md px-4 py-2 mt-4">Simpan</button>
                    <a href="{{ route('admin/subkriteria') }}" class="text-blue-500 hover:underline mt-2 block">Kembali ke Daftar Sub Kriteria</a>
                </div>
            </form>
        </div>
    </div>
@endsection
