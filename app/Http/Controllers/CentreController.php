<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centres = Centre::paginate(10);
        return view('centres.index', compact('centres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('centres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        Centre::create($request->all());
        return redirect()->route('centres.index')->with('success', 'Centre creat correctament.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Centre $centre)
    {
        return view('centres.show', compact('centre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centre $centre)
    {
        return view('centres.edit', compact('centre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centre $centre)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $centre->update($request->all());
        return redirect()->route('centres.index')->with('success', 'Centre actualitzat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centre $centre)
    {
        $centre->delete();
        return redirect()->route('centres.index')->with('success', 'Centre eliminat correctament.');
    }
}
