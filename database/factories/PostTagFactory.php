<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\PostTag;
use App\Models\Post;
use App\Models\Tag;
class PostTagFactory extends Factory {
protected  $model = PostTag::class;
public function definition(): array {
        $post = Post::factory();
        $tag = Tag::factory();

        return [
            'post_id' => $post,
            'tag_id' => $tag,
        ];
}
}