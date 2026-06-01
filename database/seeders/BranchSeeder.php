<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::insert([
            [
                'name' => 'Cabang Cianjur',
                'city' => 'Cianjur',
                'address' => 'Jl. Raya Cianjur'
            ],
            [
                'name' => 'Cabang Bandung',
                'city' => 'Bandung',
                'address' => 'Jl. Asia Afrika'
            ],
            [
                'name' => 'Cabang Sukabumi',
                'city' => 'Sukabumi',
                'address' => 'Jl. Ahmad Yani'
            ],
            [
                'name' => 'Cabang Bogor',
                'city' => 'Bogor',
                'address' => 'Jl. Pajajaran'
            ],
            [
                'name' => 'Cabang Jakarta',
                'city' => 'Jakarta',
                'address' => 'Jl. Sudirman'
            ],
        ]);
    }
}