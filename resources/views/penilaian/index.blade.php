@extends('layouts.app')

@section('title', 'Daftar Penilaian')

@section('contents')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="font-bold text-2xl ml-3">Daftar Penilaian</h1>
        <a href="{{ route('admin/penilaian/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Tambah Penilaian
        </a>
    </div>
    <hr class="mb-4" />

    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            @php $no = 1; @endphp
            @foreach ($penilaians as $alternatif_id => $penilaianGroup)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $no++ }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $penilaianGroup->first()->alternatif->nama_alternatif }}</td>
                <td class="px-6 py-3">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin/penilaian/edit', $alternatif_id) }}" class="text-green-800">Edit</a>
                            <form action="{{ route('admin/penilaian/destroy', $alternatif_id) }}" method="POST" onsubmit="return confirm('Delete?')" class="inline-block">
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
@endsection
