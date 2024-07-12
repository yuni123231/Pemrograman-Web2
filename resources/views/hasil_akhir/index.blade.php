@extends('layouts.app')

@section('title', 'Hasil Akhir')

@section('contents')
<h1 class="text-2xl font-bold mb-4">Hasil Perhitungan SPK Metode WP</h1>

<h2 class="text-xl font-semibold mt-6 mb-2">Hasil Akhir</h2>
<table id="vVectorTable" class="min-w-full divide-y divide-gray-200 border display">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai V</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ranking</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @php
            $rank = 1;
        @endphp
        @foreach ($vVector as $alternatif => $nilaiV)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $alternatif }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $nilaiV }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $rank }}</td>
            </tr>
            @php
                $rank++;
            @endphp
        @endforeach
    </tbody>
</table>
@endsection
