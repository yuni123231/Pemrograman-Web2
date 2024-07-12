<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with('alternatif')->get()->groupBy('alternatif_id');
        return view('penilaian.index', compact('penilaians'));
    }

    public function create()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('subKriterias')->get();
        return view('penilaian.create', compact('alternatifs', 'kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'penilaian' => 'required|array',
            'penilaian.*.kriteria_id' => 'required|exists:kriterias,id',
            'penilaian.*.sub_kriteria_id' => 'required|exists:sub_kriterias,id',
            'penilaian.*.nilai' => 'required|numeric',
        ]);

        foreach ($request->penilaian as $penilaianData) {
            Penilaian::create([
                'alternatif_id' => $request->alternatif_id,
                'kriteria_id' => $penilaianData['kriteria_id'],
                'sub_kriteria_id' => $penilaianData['sub_kriteria_id'],
                'nilai' => $penilaianData['nilai'],
            ]);
        }

        return redirect()->route('admin/penilaian')->with('success', 'Penilaian berhasil dibuat.');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $kriterias = Kriteria::with('subKriterias')->get();
        $penilaians = Penilaian::where('alternatif_id', $id)->get()->keyBy('kriteria_id');

        return view('penilaian.edit', compact('alternatif', 'kriterias', 'penilaians'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'penilaian.*.kriteria_id' => 'required|exists:kriterias,id',
            'penilaian.*.sub_kriteria_id' => 'required|exists:sub_kriterias,id',
            'penilaian.*.nilai' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        foreach ($request->penilaian as $penilaianData) {
            $penilaian = Penilaian::where('alternatif_id', $id)
                ->where('kriteria_id', $penilaianData['kriteria_id'])
                ->firstOrFail();

            $penilaian->sub_kriteria_id = $penilaianData['sub_kriteria_id'];
            $penilaian->nilai = $penilaianData['nilai'];
            $penilaian->save();
        }

        return redirect()->route('admin/penilaian')->with('success', 'Penilaian berhasil diupdate.');
    }

    public function destroy($id)
    {
        Penilaian::where('alternatif_id', $id)->delete();

        return redirect()->route('admin/penilaian')->with('success', 'Penilaian berhasil dihapus.');
    }

    public function getSubKriteriaNilai($id)
    {
        $subKriteria = SubKriteria::find($id);
        return response()->json(['nilai' => $subKriteria->nilai]);
    }
}
