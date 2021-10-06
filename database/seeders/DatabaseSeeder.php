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

        /*$maide = User::create([
            'name'=>'Maide Akdede',
            'slug'=>'maide-akdede',
            'email'=>'maide.akdede@student.hepl.be',
            'password'=>bcrypt('Maide'),
        ]);
        $emma = User::create([
            'name'=>'Emmanuelle Vo',
            'slug'=>'emmanuelle-vo',
            'email'=>'emmanuelle.vo@student.hepl.be',
            'password'=>bcrypt('Emma'),
        ]);

        $user = User::factory(5)->create();

        $family = Category::create([
            'name'=>'Family',
            'slug'=>'family',
        ]);
        $work = Category::create([
            'name'=>'Work',
            'slug'=>'work',
        ]);
        $hobby = Category::create([
            'name'=>'Hobby',
            'slug'=>'hobby',
        ]);

        Post::create([
            'title'=>'Mon post 1',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(12),
            'slug'=>'post-1',
            'category_id'=> $family->id,
            'user_id'=> $maide->id,
            'excerpt'=>'Lorem ipsum 1',
        ]);
        Post::create([
            'title'=>'Mon post 2',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(10),
            'slug'=>'post-2',
            'category_id'=> $work->id,
            'user_id'=> $maide->id,
            'excerpt'=>'Lorem ipsum 2',
        ]);
        Post::create([
            'title'=>'Mon post 3',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(8),
            'slug'=>'post-3',
            'category_id'=> $family->id,
            'user_id'=> $emma->id,
            'excerpt'=>'Lorem ipsum 3',
        ]);
        Post::create([
            'title'=>'Mon post 4',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(5),
            'slug'=>'post-4',
            'category_id'=> $family->id,
            'user_id'=> $maide->id,
            'excerpt'=>'Lorem ipsum 4',
        ]);*/
    }
}
