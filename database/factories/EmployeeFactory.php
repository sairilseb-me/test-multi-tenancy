<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\TenantUser;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id' => \App\Models\Tenant::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'position' => $this->faker->jobTitle(),
            'birthdate' => $this->faker->date(),
            'department_id' => \App\Models\Department::inRandomOrder()->first()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Employee $employee) {
            // Additional setup after creating an Employee, if needed
            $user = User::create([
                'email' => strtolower($employee->first_name) . '.' . strtolower($employee->last_name) . '@example.com',
                'password' => bcrypt('password123'),
                'employee_id' => $employee->id,
            ]);

            TenantUser::create([
                'tenant_id' => $employee->tenant_id,
                'user_id' => $user->id,
                'role_id' => Role::inRandomOrder()->first()->id,
            ]);
        });
    }
}
