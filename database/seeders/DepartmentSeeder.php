<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Human Resources',
            'Finance',
            'IT',
            'Marketing',
            'Sales',
            'Customer Support',
            'Research and Development',
        ];

        $tenants = \App\Models\Tenant::all();

        foreach ($tenants as $tenant) {
            foreach ($departments as $departmentName) {
                \App\Models\Department::create([
                    'tenant_id' => $tenant->id,
                    'name' => $departmentName,
                ]);
            }
        }
    }
}
