<?php
namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\SubKriteria; // Pastikan Anda mengimpor model SubKriteria
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlternatifRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::orderBy('created_at', 'DESC')->get();
        return view('alternatif.index', compact('alternatifs'));
    }

    public function create()
    {
        $sub_kriteria = SubKriteria::all(); // Ambil semua data subkriteria
        return view('alternatif.create', compact('sub_kriteria')); // Kirim data ke view
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|string|max:255',
            'nama_alternatif' => 'required|string|max:255',
            'alamatTempatLes' => 'nullable|string',
        ]);

        // Simpan data alternatif ke dalam database
        Alternatif::create($validatedData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin/alternatif')->with('success', 'Alternatif berhasil ditambahkan!');
    }

    public function show($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('alternatif.show', compact('alternatif'));
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|string|max:255',
            'nama_alternatif' => 'required|string|max:255',
            'alamatTempatLes' => 'nullable|string',
        ]);

        $alternatif->update($validatedData);
        return redirect()->route('admin/alternatif')->with('success', 'Alternatif berhasil diperbarui');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();
        return redirect()->route('admin/alternatif')->with('success', 'Alternatif berhasil dihapus');
    }
}
