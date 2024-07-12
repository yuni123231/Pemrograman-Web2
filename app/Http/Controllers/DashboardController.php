<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil kriteria dan bobotnya
        $kriterias = Kriteria::all();
        $criteriaLabels = $kriterias->pluck('nama_kriteria'); // Misalnya 'name' adalah kolom untuk nama kriteria
        $criteriaWeights = $kriterias->pluck('bobot'); // Misalnya 'weight' adalah kolom untuk bobot kriteria

        return view('dashboard', compact('criteriaLabels', 'criteriaWeights'));
    }
}
