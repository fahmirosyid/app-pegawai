<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::orderBy('nama_departemen')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        Department::create($request->only('nama_departemen'));

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        $department->update($request->only('nama_departemen'));

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
