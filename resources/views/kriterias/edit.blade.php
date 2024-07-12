@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('contents')
<div class="px-6 py-4">
    <h1 class="text-2xl font-bold mb-4">Edit Kriteria</h1>
    <hr class="mb-6">

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Kriteria</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Edit informasi kriteria sesuai dengan kebutuhan.</p>
        </div>
        <div class="border-t border-gray-200">
            <form action="{{ route('admin/kriterias/update', $kriteria->id) }}" method="POST" class="px-4 py-5 sm:p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label for="kode_kriteria" class="block text-sm font-medium text-gray-700">Kode Kriteria</label>
                        <input type="text" name="kode_kriteria" id="kode_kriteria" autocomplete="off" value="{{ $kriteria->kode_kriteria }}" class="mt-1 block w-full px-3 py-2 border-0 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="nama_kriteria" class="block text-sm font-medium text-gray-700">Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" id="nama_kriteria" autocomplete="off" value="{{ $kriteria->nama_kriteria }}" class="mt-1 block w-full px-3 py-2 border-0 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                        <input type="number" name="bobot" id="bobot" autocomplete="off" value="{{ $kriteria->bobot }}" class="mt-1 block w-full px-3 py-2 border-0 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="atribut" class="block text-sm font-medium text-gray-700">Atribut</label>
                        <select id="atribut" name="atribut" autocomplete="off" class="mt-1 block w-full px-3 py-2 border-0 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="cost" {{ $kriteria->atribut == 'cost' ? 'selected' : '' }}>Cost</option>
                            <option value="benefit" {{ $kriteria->atribut == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
