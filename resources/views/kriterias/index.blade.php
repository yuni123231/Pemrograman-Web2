@extends('layouts.app')
 
@section('title', 'Data Kriteria')
 
@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Daftar Kriteria</h1>
    <a href="{{ route('admin/kriterias/create') }}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Kriteria</a>
    <hr />
 
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">NO</th>
                <th scope="col" class="px-6 py-3">KODE</th>
                <th scope="col" class="px-6 py-3">NAMA</th>
                <th scope="col" class="px-6 py-3">BOBOT</th>
                <th scope="col" class="px-6 py-3">JENIS</th>
                <th scope="col" class="px-6 py-3">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @if($kriteria->count() > 0)
                @foreach($kriteria as $rs)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $rs->kode_kriteria }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $rs->nama_kriteria }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $rs->bobot }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $rs->atribut }}
                    </td>
                    <td class="px-6 py-4 w-36">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin/kriterias/show', $rs->id) }}" class="text-blue-800">Detail</a>
                            <a href="{{ route('admin/kriterias/edit', $rs->id) }}" class="text-green-800">Edit</a>
                            <form action="{{ route('admin/kriterias/destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="inline-block text-red-800">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-transparent border-none text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td class="text-center px-6 py-4" colspan="6">Data Kriteria Tidak ditemukan</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
