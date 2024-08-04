<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Book One', 'author' => 'Author One'],
            ['title' => 'Book Two', 'author' => 'Author Two'],
            ['title' => 'Book Three', 'author' => 'Author Three'],
            ['title' => 'Book Four', 'author' => 'Author Four'],
            ['title' => 'Book Five', 'author' => 'Author Five'],
        ]);
        
    }
}
