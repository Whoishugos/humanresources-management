<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HumanResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed Departments
        DB::table('departments')->insert([
            [
            'name' => 'HR',
            'description' => 'Human Resources',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null,
        ],
        [
            'name' => 'IT',
            'description' => 'Information Technology',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null,
        ],
        [
            'name' => 'Sales',
            'description' => 'Information Technology',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null,
        ],
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'HR Manager',
                'description' => 'Marketing Department',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'IT Support',
                'description' => 'IT Support Department',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Developer',
                'description' => 'Developer Department',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Finance',
                'description' => 'Finance Department',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
        DB::table('employees')->insert([
            [
                'fullname' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone_number' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'birth_date' => $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
                'hire_date' => Carbon::now(),
                'department_id' => 1, // HR
                'role_id' => 1, // HR Manager
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000, 7000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at'=> null,
            ],
            [
                'fullname' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone_number' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'birth_date' => $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
                'hire_date' => Carbon::now(),
                'department_id' => 1, // HR
                'role_id' => 1, // HR Manager
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000, 7000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'delete_at'=> null,
            ],

        ]);
         DB::table('tasks')->insert([
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'assigned_to' => 1, // HR Manager
                'due_date' => Carbon::now()->addDays(7),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'assigned_to' => 1, // HR Manager
                'due_date' => Carbon::now()->addDays(7),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

             ]);
             DB::table('payroll')->insert([
            [
                'employee_id' => 1, // HR Manager
                'pay_date' => Carbon::parse('2025-07-01'),
                'salary' => $faker->randomFloat(2, 3000, 7000),
                'bonuses' => $faker->randomFloat(2, 3000, 7000),
                'deductions' => $faker->randomFloat(2, 500, 1000),
                'net_salary' => $faker->randomFloat(2, 3000, 7000),
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2, // IT Support
                'pay_date' => Carbon::parse('2025-07-01'),
                'salary' => $faker->randomFloat(2, 3000, 7000),
                'bonuses' => $faker->randomFloat(2, 3000, 7000),
                'deductions' => $faker->randomFloat(2, 500, 1000),
                'net_salary' => $faker->randomFloat(2, 3000, 7000),
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            ]);

            DB::table('presences')->insert([
            [
                'employee_id' => 1, // HR Manager
                'check_in' => Carbon::now()->format('Y-m-d H:i:s'),
                'check_out' => Carbon::now()->addHours(8)->format('Y-m-d H:i:s'),
                'date' => Carbon::now()->format('Y-m-d'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'employee_id' => 2, // IT Support
                'check_in' => Carbon::now()->format('Y-m-d H:i:s'),
                'check_out' => Carbon::now()->addHours(8)->format('Y-m-d H:i:s'),
                'date' => Carbon::now()->format('Y-m-d'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            ]);
             DB::table('leave_request')->insert([
            [
                'employee_id' => 1, // HR Manager
                'leave_type' => 'Sick',
                'start_date' => Carbon::now()->addDays(1)->format('Y-m-d'),
                'end_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'reason' => $faker->sentence(),
                'status' => 'review',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'employee_id' => 2, // IT Support
                'leave_type' => 'Vacation',
                'start_date' => Carbon::now()->addDays(1)->format('Y-m-d'),
                'end_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'reason' => $faker->sentence(),
                'status' => 'review',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
