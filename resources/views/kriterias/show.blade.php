@extends('layouts.app')

@section('title', 'Detail Kriteria')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Kriteria</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Kode Kriteria</label>
            <div class="mt-2">
                {{ $kriteria->kode_kriteria }}
            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nama Kriteria</label>
            <div class="mt-2">
                {{ $kriteria->nama_kriteria }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Bobot Nilai</label>
            <div class="mt-2">
                {{ $kriteria->bobot }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Atribut</label>
            <div class="mt-2">
                {{ $kriteria->atribut }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection