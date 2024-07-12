<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\SubKriteria;

class DataPerhitunganController extends Controller
{
    public function hitung()
    {
        // Ambil semua data penilaian
        $penilaians = Penilaian::with('alternatif', 'kriteria')->get();

        // Inisialisasi matriks keputusan
        $xMatrix = [];

        // Loop melalui data penilaian untuk membentuk matriks keputusan
        foreach ($penilaians as $penilaian) {
            $alternatifName = $penilaian->alternatif->nama_alternatif;
            $kriteriaName = 'C' . $penilaian->kriteria->id;
            $nilai = $penilaian->nilai;

            $xMatrix[$alternatifName][$kriteriaName] = $nilai;
        }

        // Ambil data bobot kriteria
        $kriterias = Kriteria::all();
        $wMatrix = [];
        $typeKriteria = [];
        
        foreach ($kriterias as $kriteria) {
            $kriteriaName = 'C' . $kriteria->id;
            $wMatrix[$kriteriaName] = $kriteria->bobot;
            $typeKriteria[$kriteriaName] = $kriteria->atribut;  // cost atau benefit
        }

        // Normalisasi bobot kriteria
        $totalBobot = array_sum($wMatrix);
        $normalizedWMatrix = [];
        foreach ($wMatrix as $kriteria => $bobot) {
            if ($typeKriteria[$kriteria] == 'cost') {
                // Kriteria cost (semakin kecil semakin baik)
                $normalizedWMatrix[$kriteria] = -$bobot / $totalBobot;
            } else {
                // Kriteria benefit (semakin besar semakin baik)
                $normalizedWMatrix[$kriteria] = $bobot / $totalBobot;
            }
        }

        // Hitung nilai vektor S
        $sVector = [];
        foreach ($xMatrix as $alternatif => $kriterias) {
            $sVector[$alternatif] = 1;
            foreach ($kriterias as $kriteria => $nilai) {
                $sVector[$alternatif] *= pow($nilai, $normalizedWMatrix[$kriteria]);
            }
        }

        // Hitung total nilai vektor S
        $totalSVector = array_sum($sVector);

        // Hitung nilai vektor V
        $vVector = [];
        foreach ($sVector as $alternatif => $nilaiS) {
            $vVector[$alternatif] = $nilaiS / $totalSVector;
        }

        // Urutkan nilai vektor V dari tertinggi hingga terendah
        arsort($vVector);

        return view('perhitungan.index', compact('xMatrix', 'wMatrix', 'normalizedWMatrix', 'sVector', 'vVector'));
    }
}
