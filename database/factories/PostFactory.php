<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;


    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(20,true),
            'content'=>$this->faker->paragraph(rand(15,50)),
            'category_id'=>rand(1,4),
            'photo_id' => rand(1,6),
            'user_id' => 1,
            'status' => rand(0,1)
            //
        ];
    }
}
