<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $tenants = \App\Models\Tenant::all();
        try {
             foreach ($tenants as $tenant) {
                \App\Models\Employee::factory()->count(10)->create([
                    'tenant_id' => $tenant->id,
                ]);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
       

       
    }
}
