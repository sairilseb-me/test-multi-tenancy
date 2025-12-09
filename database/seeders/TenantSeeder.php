<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            [
                'name' => 'Tenant One',
                'domain' => 'tenantone.example.com',
                'plan_type' => 'basic',
                'settings' => json_encode(['timezone' => 'UTC', 'currency' => 'USD']),
            ],
            [
                'name' => 'Tenant Two',
                'domain' => 'tenanttwo.example.com',
                'plan_type' => 'premium',
                'settings' => json_encode(['timezone' => 'America/New_York', 'currency' => 'USD']),
            ],
            [
                'name' => 'Tenant Three',
                'domain' => 'tenantthree.example.com',
                'plan_type' => 'enterprise',
                'settings' => json_encode(['timezone' => 'Europe/London', 'currency' => 'GBP']),
            ],
        ];
        foreach ($tenants as $tenant) {
            \App\Models\Tenant::create($tenant);
        }
    }
}
