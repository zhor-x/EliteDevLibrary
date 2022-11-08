<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::all();
        $books = Book::all();
        $books->each(fn($book) => $book->authors()->attach(
            $authors->random(rand(1, 3))->pluck('id')->toArray()
        ));
    }
}
