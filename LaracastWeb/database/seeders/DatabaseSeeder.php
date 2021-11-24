<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        

        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        Post::factory(10) -> create();


    //  $user = User::factory()->create();

    //     $personal = Category::create([
    //         'name' => 'PersonalFamily' , 
    //         'slug' => ' this is a first category ' 
    //     ]);

    //     $work = Category::create([
    //         'name' => 'Work' , 
    //         'slug' => ' this is a first category ' 
    //     ]);

    //     $family = Category::create([
    //         'name' => 'Family' , 
    //         'slug' => ' this is a first category ' 
    //     ]);


    //     Post::create([
    //         'user_id' => $user -> id ,
    //         'category_id' => $family ->id ,
    //         'title' => 'the first Post ' ,
    //         'excerpt' => 'Loren the fist post' , 
    //         'body' => ' the first body Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto the first '
    
    //     ]);
    //     Post::create([
    //         'user_id' => $user -> id ,
    //         'category_id' => $work ->id ,
    //         'title' => 'the second  Post ' ,
    //         'excerpt' => 'Loren the fist work post' , 
    //         'body' => ' the second work body Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto the first '
    
    //     ]);

    //     Post::create([
    //         'user_id' => $user -> id ,
    //         'category_id' => $personal ->id ,
    //         'title' => 'the personal  Post ' ,
    //         'excerpt' => 'Loren the fist personal post' , 
    //         'body' => ' the personal work body Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto the first '
    
    //     ]);
    }


   
}
