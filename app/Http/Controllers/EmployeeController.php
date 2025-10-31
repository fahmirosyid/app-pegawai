<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // eager load relasi agar query efisien
        $employees = Employee::with(['department', 'position'])->orderBy('nama_lengkap')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::orderBy('nama_departemen')->get();
        $positions = Position::orderBy('nama_jabatan')->get();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:50',
            'departemen_id'  => 'nullable|exists:departments,id',
            'jabatan_id'     => 'nullable|exists:positions,id',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show(Employee $employee)
    {
        $employee->load(['department', 'position']);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('nama_departemen')->get();
        $positions = Position::orderBy('nama_jabatan')->get();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:50',
            'departemen_id'  => 'nullable|exists:departments,id',
            'jabatan_id'     => 'nullable|exists:positions,id',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil diupdate.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
