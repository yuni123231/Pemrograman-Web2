<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Models\Kriteria;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $sub_kriteria = SubKriteria::with('kriteria')->get();
        return view('subkriteria.index', compact('sub_kriteria'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        return view('subkriteria.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'deskripsi' => 'required|string',
            'nilai' => 'required|integer',
        ]);

        SubKriteria::create($request->all());

        return redirect()->route('admin/subkriteria')->with('success', 'Sub Kriteria berhasil ditambahkan');
    }

    public function show(SubKriteria $subKriteria)
    {
        return view('subkriteria.show', compact('subKriteria'));
    }

    public function edit(SubKriteria $subKriteria)
    {
        $kriterias = Kriteria::all();
        return view('subkriteria.edit', compact('subKriteria', 'kriterias'));
    }

    public function update(Request $request, SubKriteria $subKriteria)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'deskripsi' => 'required|string',
            'nilai' => 'required|integer',
        ]);

        $subKriteria->update($request->all());

        return redirect()->route('admin/subkriteria')->with('success', 'Sub Kriteria berhasil diperbarui');
    }

    public function destroy(SubKriteria $subKriteria)
    {
        $subKriteria->delete();

        return redirect()->route('admin/subkriteria')->with('success', 'Sub Kriteria berhasil dihapus');
    }
}
