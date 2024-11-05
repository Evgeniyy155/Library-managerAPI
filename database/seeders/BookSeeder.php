<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();

        Book::factory(100)->create()
            ->each(function (Book $book) use ($authors){
                $book->authors()->attach($authors->random(rand(1,3))->pluck('id')->toArray());
            });
    }
}
