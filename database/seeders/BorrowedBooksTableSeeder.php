<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BorrowedBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('borrowed_books')->insert([
            ['borrower_id' => 1, 'book_id' => 1],
            ['borrower_id' => 2, 'book_id' => 2],
            ['borrower_id' => 3, 'book_id' => 3],
            ['borrower_id' => 4, 'book_id' => 4],
            ['borrower_id' => 5, 'book_id' => 5],
        ]);
        
        
    }
}
