<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         // Create 8 initial Books records
         $books = [
            [
                'isbn' => '978-1491918661',
                'title' => 'Learning PHP MySQL & JavaScript With jQuery CSS & HTML5',
                'author' => 'Robin Nixon',
                'category' => 'PHP, JavaScript',
                'price' => 9.99,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'one_1552604115.png'
            ],
            [
                'isbn' => '978-0596804848',
                'title' => 'Ubuntu: Up and Running: A Power Users Desktop Guide',
                'author' => 'Robin Nixon',
                'category' => 'Linux',
                'price' => 12.99,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'two_1552604215.png'
            ],
            [
                'isbn' => '978-1785881985',
                'title' => 'Linux Shell Scripting Cookbook',
                'author' => 'Clif Flynt, Sarath Lakshman and Shantanu Tushar',
                'category' => 'Linux',
                'price' => 41.99,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'three_1552604236.png'
            ],
            [
                'isbn' => '978-0596517748',
                'title' => 'JavaScript: The Good Parts',
                'author' => 'Douglas Crockford',
                'category' => 'Javascript',
                'price' => 8.99,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'four_1552604250.png'
            ],
            [
                'isbn' => '978-1-59059-862-7',
                'title' => 'Beginning PHP and MySQL',
                'author' => 'Jason W. Gilmore',
                'category' => 'PHP, JavaScript',
                'price' => 39.99,
                'email' => 'Test_User_1@hotmail.com',
                'cover_image' => 'five_1552604306.png'
            ],
            [
                'isbn' => '978-1-4302-5092-0',
                'title' => 'Beginning JavaScript with DOM Scripting and Ajax',
                'author' => 'Russ Ferguson and Christian Heilman',
                'category' => 'JavaScript, Ajax',
                'price' => 14.99,
                'email' => 'Test_User_1@hotmail.com',
                'cover_Image' => 'six_1552604320.png'
            ],
            [
                'isbn' => '978-1-4302-6076-9',
                'title' => 'Practical PHP and MySQL Website Databases',
                'author' => 'Adrian W. West',
                'category' => 'PHP, MySQL',
                'price' => 8.99,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'seven_1552604344.png'
            ],
            [
                'isbn' => '978-1-4302-6529-0',
                'title' => 'Pro ASP.NET MVC 5',
                'author' => 'Adam Freeman',
                'category' => 'ASP.NET, MVC 5',
                'price' => 45.00,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'eight_1552604357.png'
            ],
            [
                'isbn' => '978-1788833912',
                'title' => 'Hands-On Full Stack Web Development with Angular 6 and Laravel 5',
                'author' => 'Fernando Monteiro',
                'category' => 'Angular 6, Laravel 5',
                'price' => 32.99,
                'email' => 'VS1Toronto@hotmail.com',
                'cover_image' => 'full_stack_angular_laravel_1552613510.png'
            ],          
        ];

        foreach ($books as $book)
            DB::table('books')->insert($book);
     }
 }
