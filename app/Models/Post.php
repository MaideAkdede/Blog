<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $body;

    public $excerpt;

    public $date;

    public $slug;

    /**
     * Post constructor.
     * @param $title
     * @param $body
     * @param $excerpt
     * @param $date
     * @param $slug
     */
    public function __construct($title, $body, $excerpt, $date, $slug)
    {
        $this->title = $title;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
        //ddd();
    }

    public static function all(): Collection
    {
        $files = File::files(resource_path("posts"));

        return collect($files)
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->body(),
                    $document->excerpt,
                    $document->date,
                    $document->slug
                );
            });
        /*
         * foreach ($files as $file) {
            $document = YamlFrontMatter::parseFile($file);
            $posts[] = new Post(
                $document->title,
                $document->body(),
                $document->excerpt,
                $document->date,
                $document->slug
            );
        }
        */
        /*$posts =  array_map()*/
        /* $posts = File::files(resource_path("posts"));
         $models = array_map(function ($post) {
             return $post->getContents();
             //return file_get_contents($post);
         }, $posts);
         return $models;*/
    }
}
