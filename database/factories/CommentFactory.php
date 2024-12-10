<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'body' => $this->faker->paragraph,
            'commentable_id' => 1,
            'commentable_type' => Article::class,
        ];
    }
}
