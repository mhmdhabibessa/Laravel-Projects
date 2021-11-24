<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::truncate();
        //  Post::truncate();
        //  Category::truncate(); 
        $user = User::factory()->create([
            'name' => 'Mohammad Habib'
        ]);
        Post::factory(10)->create([
            'user_id'=> $user ->id
        ]);
        
    //     $Music = Category::create([
    //         'name' => 'Music',
    //         'link_photo' => 'http://loka-official.com/wp-content/uploads/2021/09/hero-guitar-outro.jpg'

    //     ]);
    //     $Art = Category::create([
    //         'name' => 'Art',
    //         'link_photo' => 'https://www.pictureframesexpress.co.uk/blog/wp-content/uploads/2020/05/7-Tips-to-Finding-Art-Inspiration-Header-1024x649.jpg'
            
    //     ]);
    //     $Books=Category::create([
    //         'name' => 'Books',
    //         'link_photo' => 'https://foodtank.com/wp-content/uploads/2021/07/alfons-morales-YLSwjSy7stw-unsplash.jpg'
    //     ]);
        
    // Post::create([
    //     'title' => 'Guitar',
    //     'category_id' => $Music->id,
    //     'user_id' => $user ->id , 
    //     'discription' => 'The Geter is Very Good to Learn Music ' , 
    //     'link_photo' => 'https://www.businesscoot.com/uploads/study_main_image/227.webp' , 
    // ]);
    // Post::create([
    //     'title' => 'The Last Super ',
    //     'category_id' => $Art->id,
    //     'user_id' => $user ->id , 
    //     'discription' => 'The Last Super portrat  is Very Good' , 
    //     'link_photo' => 'https://facts.net/wp-content/uploads/2020/09/last-supper-4997322_1280-1200x900.png' , 
    // ]);
    // Post::create([
    //     'title' => 'Game of Throuns',
    //     'category_id' => $Books->id,
    //     'user_id' => $user ->id , 
    //     'discription' => 'The Books Game of throuns  is Very Good to Learn about Battle ' , 
    //     'link_photo' => 'https://images-na.ssl-images-amazon.com/images/I/81q1AybR-ZL.jpg' , 
    // ]);
    }

}
