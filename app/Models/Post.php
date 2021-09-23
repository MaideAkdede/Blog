<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug)
    {
        base_path();
        $path = resource_path("posts/{$slug}.html");
        //(!file_exists($path = resource_path("posts/{$slug}.html"))
        if (!file_exists($path)) {
           throw new ModelNotFoundException();
        }
        return cache()->remember("posts.{$slug}", now()->addHour(), fn() => file_get_contents($path));
    }
    public static function all(): array
    {
        $posts = File::files(resource_path("posts"));
        return $posts;
    }
}
