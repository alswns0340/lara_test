<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\BookDetail;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(10)->create();

        Publisher::factory(5)->create();

        Book::factory(30)->create()->each(function ($book) {
            BookDetail::factory()->create(['book_id'=>$book->id]);
        });

        User::factory(10)->create()->each(
            function ($user) {
            Article::factory(rand(1,3))->create(['user_id'=>$user->id])->each(function ($article) {
                Comment::factory(rand(0,5))->create(['article_id'=>$article->id]);
            });
            }
        );

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(DemoDataSeeder::class);
    }
}
