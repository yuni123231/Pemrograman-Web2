@extends('layouts.app')

@section('title', 'Tambah Kriteria')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Tambah Kriteria</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <form action="{{ route('admin/kriterias/store') }}" method="POST" enctype="multipart/form-data" class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        @csrf

        <!-- Kode Kriteria -->
        <div class="sm:col-span-4">
            <label for="kode_kriteria" class="block text-sm font-medium leading-6 text-gray-900">Kode Kriteria</label>
            <input type="text" name="kode_kriteria" id="kode_kriteria" placeholder="Masukkan Kode Kriteria" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <!-- Nama Kriteria -->
        <div class="sm:col-span-4">
            <label for="nama_kriteria" class="block text-sm font-medium leading-6 text-gray-900">Nama Kriteria</label>
            <input id="nama_kriteria" name="nama_kriteria" type="text" placeholder="Masukkan Nama Kriteria" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <!-- Bobot -->
        <div class="sm:col-span-4">
            <label for="bobot" class="block text-sm font-medium leading-6 text-gray-900">Bobot</label>
            <input id="bobot" name="bobot" type="number" placeholder="Masukkan Bobot" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <!-- Atribut (Jenis) -->
        <div class="sm:col-span-4">
            <label for="atribut" class="block text-sm font-medium leading-6 text-gray-900">Atribut</label>
            <select id="atribut" name="atribut" class="block w-full border-2 border-gray-300 rounded-md px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500">
                <option value="cost">Cost</option>
                <option value="benefit">Benefit</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="sm:col-span-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md px-4 py-2">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
