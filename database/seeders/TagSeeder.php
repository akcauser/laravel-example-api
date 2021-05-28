<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            Tag::factory()->create([
                'blog_id' => $blog->id,
            ]);
        }
    }
}
