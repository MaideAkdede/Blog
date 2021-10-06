<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        //$user = User::factory()->create(['name'=>'John Doe', 'slug'=>'john-doe']);
        //$user = User::factory()->create(['name'=>'Jane Doe', 'slug'=>'jane-doe']);
        //
        //$category = Category::factory()->create(['name'=>'Family', 'slug'=>'family']);
        //$category = Category::factory()->create(['name'=>'Work', 'slug'=>'work']);
//        $category = Category::factory()->create(['name'=>'Hobby', 'slug'=>'hobby']);
        //

        User::factory()->create(['name' => 'John Doe', 'slug' => 'john-doe']);
        User::factory()->create(['name' => 'Jane Doe', 'slug' => 'jane-doe']);
        //
        Category::factory()->create(['name' => 'Family', 'slug' => 'family']);
        Category::factory()->create(['name' => 'Work', 'slug' => 'work']);
        Category::factory()->create(['name' => 'Hobby', 'slug' => 'hobby']);
        //
        $newCategory = Category::factory()->create();
        $newUser = User::factory()->create();
        //
        Post::factory(100)->create(
            (function () use ($newCategory, $newUser) {
                if (rand(1, 100) > 98) {
                    return [
                        'user_id' => $newUser,
                        'category_id' => $newCategory,
                    ];
                } else {
                    return [
                        'user_id' => rand(1, 2),
                        'category_id' => rand(1, 3),
                    ];
                }
            }));
    }
}
