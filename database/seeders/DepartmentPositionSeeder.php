<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Position;

class DepartmentPositionSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            ['nama_departemen' => 'HRD', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'IT', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'Finance', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Position::insert([
            ['nama_jabatan' => 'Staff', 'gaji_pokok' => 3000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Supervisor', 'gaji_pokok' => 5000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Manager', 'gaji_pokok' => 8000000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
