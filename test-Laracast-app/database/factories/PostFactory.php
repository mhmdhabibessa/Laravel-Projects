<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
              
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'title' => $this ->faker ->sentence(), 
            'discription' => $this ->faker ->sentence(), 
            'link_photo' => $this -> faker ->imageUrl()

        ];
    }
}
