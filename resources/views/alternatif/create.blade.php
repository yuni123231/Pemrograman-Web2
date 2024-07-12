@extends('layouts.app')

@section('title', 'Tambah Alternatif')

@section('contents')
    <div class="container mx-auto">
        <h1 class="font-bold text-2xl mb-4">Tambah Alternatif</h1>
        <hr class="mb-6"/>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Form Tambah Alternatif</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Isi informasi alternatif sesuai dengan kebutuhan.</p>
            </div>
            <div class="border-t border-gray-200">
                <form action="{{ route('admin/alternatif/store') }}" method="POST" class="p-6">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_alternatif" class="block text-sm font-medium text-gray-700">Kode Alternatif</label>
                        <input type="text" name="kode_alternatif" id="kode_alternatif" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="nama_alternatif" class="block text-sm font-medium text-gray-700">Nama Alternatif</label>
                        <input type="text" name="nama_alternatif" id="nama_alternatif" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamatTempatLes" class="block text-sm font-medium text-gray-700">Alamat Tempat Les</label>
                        <textarea name="alamatTempatLes" id="alamatTempatLes" rows="3" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md px-4 py-2">Simpan</button>
                        <a href="{{ route('admin/alternatif') }}" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-md px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
