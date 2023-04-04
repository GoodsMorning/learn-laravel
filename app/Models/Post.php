<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPUnit\Framework\returnValueMap;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('post.all',function() {
             return collect(File::files(resource_path("post")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($doc) => new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->body(),
                    $doc->slug
                ))
                ->sortBy('date');
        });
    }

    public static function find($slug)
    {
        return Post::all()->firstWhere('slug',$slug);
    }
    public static function findOrFail($slug)
    {
        $post = Post::find($slug);
        return $post ? $post : throw new ModelNotFoundException();
    }
}
