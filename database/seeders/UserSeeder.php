<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'owner'
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'branch_id' => 1
        ]);

        User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'supervisor',
            'branch_id' => 1
        ]);

        User::create([
            'name' => 'Cashier',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'cashier',
            'branch_id' => 1
        ]);

        User::create([
            'name' => 'Warehouse',
            'email' => 'warehouse@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'warehouse',
            'branch_id' => 1
        ]);
    }
}