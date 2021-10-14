<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        //
        $r = random_int(0, 100);
        $user = $r == 100 ?
            User::factory() :
            ($r >= 88 ?
                User::firstWhere('id', 1) :
                User::firstWhere('id', 2)
            );
        //
        $r = random_int(0, 100);
        $availableCategories = Category::where('slug', 'family')
            ->orWhere('slug', 'work')
            ->orWhere('slug', 'hobby');

        $category = $r == 100 ?
            Category::factory() :
            rand(1, 3);

        return [
            'user_id' => $user,
            'category_id' => $category,
            'title' => $title,
            'slug' => strtolower(str_replace([' ', '.'], ['-', ''], $title)),
            'excerpt' => '<p>'. implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'published_at' => $this->faker->dateTimeThisYear,
            'body' => '<p>'. implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
        ];
    }
}
