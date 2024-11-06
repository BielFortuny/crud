<?php

namespace App\Http\Controllers;

use App\Models\Ensenyament;
use Illuminate\Http\Request;

class EnsenyamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ensenyaments = Ensenyament::paginate(10); // Paginació per a la llista d'ensenyaments
        return view('ensenyaments.index', compact('ensenyaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ensenyaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        Ensenyament::create($request->all());
        return redirect()->route('ensenyaments.index')->with('success', 'Ensenyament creat correctament.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ensenyament $ensenyament)
    {
        return view('ensenyaments.show', compact('ensenyament'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ensenyament $ensenyament)
    {
        return view('ensenyaments.edit', compact('ensenyament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ensenyament $ensenyament)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $ensenyament->update($request->all());
        return redirect()->route('ensenyaments.index')->with('success', 'Ensenyament actualitzat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ensenyament $ensenyament)
    {
        $ensenyament->delete();
        return redirect()->route('ensenyaments.index')->with('success', 'Ensenyament eliminat correctament.');
    }
}
