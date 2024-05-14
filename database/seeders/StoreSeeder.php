<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'BookStore A',
            'address' => '828 Broadway, New York, NY 10003',
            'active' => true,
        ]);

        Store::create([
            'name' => 'BookStore B',
            'address' => '192 10th Ave, New York, NY 10011',
            'active' => false,
        ]);
    }
}
