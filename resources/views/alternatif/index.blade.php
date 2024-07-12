@extends('layouts.app')

@section('title', 'Daftar Alternatif')

@section('contents')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar Alternatif</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin/alternatif/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah Alternatif</a>
    </div>
    <hr />

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">NO</th>
                    <th scope="col" class="px-6 py-3">KODE</th>
                    <th scope="col" class="px-6 py-3">NAMA</th>
                    <th scope="col" class="px-6 py-3">ALAMAT</th>
                    <th scope="col" class="px-6 py-3">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifs as $alternatif)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3">{{ $alternatif->kode_alternatif }}</td>
                    <td class="px-6 py-3">{{ $alternatif->nama_alternatif }}</td>
                    <td class="px-6 py-3">{{ $alternatif->alamatTempatLes }}</td>
                    <td class="px-6 py-3">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin/alternatif/show', $alternatif->id) }}" class="text-blue-800">Detail</a>
                            <a href="{{ route('admin/alternatif/edit', $alternatif->id) }}" class="text-green-800">Edit</a>
                            <form action="{{ route('admin/alternatif/destroy', $alternatif->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
