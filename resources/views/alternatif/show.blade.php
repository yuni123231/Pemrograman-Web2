@extends('layouts.app')

@section('title', 'Detail Alternatif')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Alternatif</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Kode Alternatif</label>
            <div class="mt-2">
                {{ $alternatif->kode_alternatif }}
            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nama Alternatif</label>
            <div class="mt-2">
                {{ $alternatif->nama_alternatif }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Alamat Tempat Les</label>
            <div class="mt-2">
                {{ $alternatif->alamatTempatLes }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection