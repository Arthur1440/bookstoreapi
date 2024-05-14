<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'name' => 'The Lord of the Rings',
            'ISBN' => 9780007525498,
            'value' => 29.99,
        ]);

        Book::create([
            'name' => 'Harry Potter and the Philosophers Stone',
            'ISBN' => 9780747532743,
            'value' => 24.99,
        ]);
    }
}
