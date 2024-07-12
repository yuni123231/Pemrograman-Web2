<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    public function index()
    {
        // Fetch all kriteria from the database
        $kriteria = Kriteria::orderBy('created_at', 'DESC')->get();
        return view('kriterias.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriterias.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'kode_kriteria' => 'required|string|max:100',
            'nama_kriteria' => 'required|string|max:100',
            'bobot' => 'required|integer',
            'atribut' => 'required|string|max:100',
        ]);

        // Create a new kriteria
        $user_id = Auth::id();

        Kriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'atribut' => $request->atribut,
            'user_id' => $user_id,
        ]);

        // Redirect to the index page with success message
        return redirect()->route('admin/kriterias')->with('success', 'Kriteria created successfully.');
    }

    public function show(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriterias.show', compact('kriteria'));
    }

    public function edit(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriterias.edit', compact('kriteria'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the request data
        // $validatedData = $request->validate([
        //     'kode_kriteria' => 'required|string|max:100',
        //     'nama_kriteria' => 'required|string|max:100',
        //     'bobot' => 'required|integer',
        //     'atribut' => 'required|string|max:100',
        // ]);

        // // Update the kriteria
        // $kriteria->update($validatedData);

        $kriteria = Kriteria::findOrFail($id);
 
        $kriteria->update($request->all());


        // // Redirect to the index page with success message
        return redirect()->route('admin/kriterias')->with('success', 'Kriteria updated successfully.');
    }

    public function destroy(string $id)
    {
        // Delete the kriteria
        $kriteria = Kriteria::findOrFail($id);

        $kriteria->delete();

        // Redirect to the index page with success message
        return redirect()->route('admin/kriterias')->with('success', 'Kriteria deleted successfully.');
    }
}
