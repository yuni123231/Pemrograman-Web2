<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\Kriteria;

class RekomendasiController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('subKriterias')->get();
        return view('rekomendasi', compact('kriterias'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'biaya' => 'required|string',
            'jarak' => 'required|string',
            'fasilitas' => 'required|string',
            'keahlian_guru' => 'required|string',
            'kurikulum' => 'required|string'
        ]);

        // Logika untuk menghitung dan mendapatkan rekomendasi berdasarkan inputan user
        // Berikut adalah contoh sederhana, logika sesungguhnya dapat lebih kompleks
        $recommendations = [
            [
                'name' => 'Neutron',
                'address' => 'Jalan Kartini No.18, Panggung, Tegal Timur, Kejambon, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52122, Indonesia',
                'biaya' => 'Mahal',
                'jarak' => 'Sedang',
                'fasilitas' => 'Lengkap',
                'keahlian_guru' => 'Tinggi',
                'kurikulum' => 'Nasional'
            ],
            [
                'name' => 'Ganesha Operation',
                'address' => 'Jalan KS Tubun No.13, Pekauman, Tegal Barat, Randugunting, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52125, Indonesia',
                'biaya' => 'Sedang',
                'jarak' => 'Sedang',
                'fasilitas' => 'Lengkap',
                'keahlian_guru' => 'Tinggi',
                'kurikulum' => 'Internasional'
            ],
            [
                'name' => 'Bimbel Lucky',
                'address' => 'Jl. Industri No.5, Panggung, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52122, Indonesia',
                'biaya' => 'Murah',
                'jarak' => 'Jauh',
                'fasilitas' => 'Cukup',
                'keahlian_guru' => 'Sedang',
                'kurikulum' => 'Nasional'
            ],
            [
                'name' => 'LBB Primagama',
                'address' => 'Jl. Arjuna, Slerok, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52125, Indonesia',
                'biaya' => 'Sedang',
                'jarak' => 'Jauh',
                'fasilitas' => 'Cukup',
                'keahlian_guru' => 'Sedang',
                'kurikulum' => 'Nasional'
            ],
            [
                'name' => 'Bimbel Murika Ceria',
                'address' => 'Jl. Cik Ditiro, RT.01/RW.01, Bandung, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52137, Indonesia',
                'biaya' => 'Sedang',
                'jarak' => 'Dekat',
                'fasilitas' => 'Cukup',
                'keahlian_guru' => 'Sedang',
                'kurikulum' => 'Nasional'
            ],
            // Tambahkan data rekomendasi lainnya
        ];

        // Filter recommendations berdasarkan input user
        $filteredRecommendations = array_filter($recommendations, function($recommendation) use ($request) {
            return $recommendation['biaya'] == ucfirst($request->biaya) &&
                   $recommendation['jarak'] == ucfirst($request->jarak) &&
                   $recommendation['fasilitas'] == ucfirst($request->fasilitas) &&
                   $recommendation['keahlian_guru'] == ucfirst($request->keahlian_guru) &&
                   $recommendation['kurikulum'] == ucfirst($request->kurikulum);
        });

        return view('rekomendasi', ['recommendations' => $filteredRecommendations]);
    }
}
