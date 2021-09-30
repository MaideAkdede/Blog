<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        // \App\Models\User::factory(10)->create();
        Category::create([
            'name'=>'Family',
            'slug'=>'family'
        ]);
        Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);
        Category::create([
            'name'=>'Hobby',
            'slug'=>'hobby'
        ]);

        Post::create([
            'title'=>'Mon post 1',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(12),
            'slug'=>'post-1',
            'category_id'=> Category::where('slug', 'family')->first()->id,
            'excerpt'=>'Lorem ipsum 1',
        ]);
        Post::create([
            'title'=>'Mon post 2',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(10),
            'slug'=>'post-2',
            'category_id'=> Category::where('slug', 'work')->first()->id,
            'excerpt'=>'Lorem ipsum 2'
        ]);
        Post::create([
            'title'=>'Mon post 3',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(8),
            'slug'=>'post-3',
            'category_id'=> Category::where('slug', 'hobby')->first()->id,
            'excerpt'=>'Lorem ipsum 3'
        ]);
        Post::create([
            'title'=>'Mon post 4',
            'body'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'published_at'=>now()->subDays(5),
            'slug'=>'post-4',
            'category_id'=> Category::where('slug', 'family')->first()->id,
            'excerpt'=>'Lorem ipsum 4'
        ]);
    }
}
