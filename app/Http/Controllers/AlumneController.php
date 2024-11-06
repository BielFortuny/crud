<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Centre;
use App\Models\Ensenyament;
use Illuminate\Http\Request;

class AlumneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnes = Alumne::paginate(10); // Paginació per a la llista d'alumnes
        return view('alumne', compact('alumnes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        $alumne = new Alumne(); // Instància buida d'Alumne
        $title = __("Afegir Alumne");
        $route = route('alumne.store');
        $textButton = __("Afegir");
        return view('alumne.create', compact('centres', 'ensenyaments', 'alumne', 'title', 'route', 'textButton'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'data_naixement' => 'required|date',
            'centre_id' => 'required|exists:centres,id',
            'ensenyament_id' => 'nullable|exists:ensenyaments,id',
        ]);

        Alumne::create($request->all());
        return redirect()->route('alumne.index')->with('success', 'Alumne creat correctament.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumne $alumne)
    {
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        $title = __("Editar Alumne");
        $route = route('alumne.update', $alumne->id);
        $textButton = __("Actualitzar");
        return view('alumne.edit', compact('alumne', 'centres', 'ensenyaments', 'title', 'route', 'textButton'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumne $alumne)
    {
        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'data_naixement' => 'required|date',
            'centre_id' => 'required|exists:centres,id',
            'ensenyament_id' => 'nullable|exists:ensenyaments,id',
        ]);

        $alumne->update($request->all());
        return redirect()->route('alumne.index')->with('success', 'Alumne actualitzat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return redirect()->route('alumne.index')->with('success', 'Alumne eliminat correctament.');
    }
}
