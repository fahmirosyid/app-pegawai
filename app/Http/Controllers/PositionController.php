<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')
            ->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')
            ->with('success', 'Data jabatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
        $position->delete();

        return redirect()->route('positions.index')
            ->with('success', 'Data jabatan berhasil dihapus.');
    }
}
