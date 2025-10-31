<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Tampilkan semua data gaji.
     */
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Form tambah data gaji baru.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Simpan data gaji baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:50',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        Salary::create($request->all());
        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail satu data gaji.
     */
    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    /**
     * Form edit data gaji.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update data gaji ke database.
     */
    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:50',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        $salary->update($request->all());
        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil diperbarui!');
    }

    /**
     * Hapus data gaji.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil dihapus!');
    }
}
