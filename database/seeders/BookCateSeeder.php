<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookCate;
use App\Models\Book;

class BookCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $categories = ['Mystery', 'Thriller', 'Adventure', 'Science Fiction', 'Horror'];

        foreach ($categories as $category) {
            BookCate::create(['name' => $category]);
        }

        $book = [
            [
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
                'price' => '1000',
                'stock' => '10',
                'book_category_id' => '1',
            ],
            [
                'title' => 'The Madwomen of Paris',
                'author' => 'Jennifer Cody Epstein',
                'price' => '1000',
                'stock' => '10',
                'book_category_id' => '2',
            ],
            [
                'title' => 'And Then There Were None',
                'author' => 'Agatha Christie',
                'price' => '1000',
                'stock' => '10',
                'book_category_id' => '3',
            ],
            [
                'title' => 'Rebecca',
                'author' => 'Daphne du Maurier',
                'price' => '1000',
                'stock' => '10',
                'book_category_id' => '4',
            ],
            [
                'title' => 'A Mask of Flies',
                'author' => 'Matthew Lyons',
                'price' => '1000',
                'stock' => '10',
                'book_category_id' => '5',
            ],
        ];

        foreach ($book as $key => $value) {
            Book::create($value);
        }


    }
}
