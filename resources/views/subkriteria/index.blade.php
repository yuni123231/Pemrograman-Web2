@extends('layouts.app')

@section('title', 'Data Sub Kriteria')

@section('contents')

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar SubKriteria</h1>
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <a href="{{ route('admin/subkriteria/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Sub Kriteria</a>
    </div>
    <hr />

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">NO</th>
                    <th scope="col" class="px-6 py-3">KRITERIA</th>
                    <th scope="col" class="px-6 py-3">DESKRIPSI</th>
                    <th scope="col" class="px-6 py-3">NILAI</th>
                    <th scope="col" class="px-6 py-3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sub_kriteria as $index => $sub)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        @if ($sub->kriteria)
                            {{ $sub->kriteria->nama_kriteria }}
                        @else
                            <em>Kriteria tidak ditemukan</em>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $sub->deskripsi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">{{ $sub->nilai }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        <a href="{{ route('admin/subkriteria/edit', $sub->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('admin/subkriteria/destroy', $sub->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
