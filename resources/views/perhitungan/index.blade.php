@extends('layouts.app')

@section('title', 'Daftar Perhitungan')

@section('contents')
<h1 class="text-2xl font-bold mb-4">Hasil Perhitungan SPK Metode WP</h1>

<h2 class="text-xl font-semibold mt-6 mb-2">Tabel Matriks Keputusan (X)</h2>
<table id="xMatrixTable" class="min-w-full divide-y divide-gray-200 border display">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Alternatif</th>
            @foreach ($xMatrix[array_key_first($xMatrix)] as $kriteria => $nilai)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $kriteria }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($xMatrix as $index => $kriterias)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $index }}</td>
                @foreach ($kriterias as $nilai)
                    <td class="px-6 py-4 whitespace-nowrap">{{ $nilai }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<h2 class="text-xl font-semibold mt-6 mb-2">Tabel Bobot Kriteria (W)</h2>
<table id="wMatrixTable" class="min-w-full divide-y divide-gray-200 border display">
    <thead class="bg-gray-50">
        <tr>
            @foreach (array_keys($wMatrix) as $kriteria)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $kriteria }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            @foreach ($wMatrix as $bobot)
                <td class="px-6 py-4 whitespace-nowrap">{{ $bobot }}</td>
            @endforeach
        </tr>
    </tbody>
</table>

<h2 class="text-xl font-semibold mt-6 mb-2">Tabel Normalisasi Bobot Kriteria (W')</h2>
<table id="normalizedWMatrixTable" class="min-w-full divide-y divide-gray-200 border display">
    <thead class="bg-gray-50">
        <tr>
            @foreach (array_keys($normalizedWMatrix) as $kriteria)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $kriteria }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            @foreach ($normalizedWMatrix as $bobot)
                <td class="px-6 py-4 whitespace-nowrap">{{ $bobot }}</td>
            @endforeach
        </tr>
    </tbody>
</table>

<h2 class="text-xl font-semibold mt-6 mb-2">Tabel Nilai Vektor (S)</h2>
<table id="sVectorTable" class="min-w-full divide-y divide-gray-200 border display">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif</th>
            @foreach (array_keys($normalizedWMatrix) as $index => $kriteria)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S{{ $loop->iteration }}</th>
            @endforeach
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai S</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($sVector as $alternatif => $nilaiS)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $alternatif }}</td>
                
                @foreach ($xMatrix[$alternatif] as $kriteria => $nilai)
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format(pow($nilai, $normalizedWMatrix[$kriteria]), 4) }}</td>
                @endforeach
                <td class="px-6 py-4 whitespace-nowrap">{{ number_format($nilaiS, 4) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2 class="text-xl font-semibold mt-6 mb-2">Tabel Nilai Vektor (V) dan Ranking</h2>
<table id="vVectorTable" class="min-w-full divide-y divide-gray-200 border display">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ranking</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai V</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($vVector as $alternatif => $nilaiV)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $alternatif }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ number_format($nilaiV, 4) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
