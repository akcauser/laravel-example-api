<?php

namespace App\Repositories\Concrete;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Repositories\Abstract\IBlogRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Data Katmanı
class BlogRepository implements IBlogRepository
{
    public function get_all()
    {
        return Blog::get();
    }

    public function store(BlogStoreRequest $request)
    {
        $blog = new Blog([
            "title" => $request->title,
            "body" => $request->body
        ]);

        if (!$blog->save()) {
            return false;
        }

        return $blog;
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        // find and update blog
        $blog->title = $request->title;
        $blog->body = $request->body;

        if (!$blog->save()) {
            return false;
        }

        return $blog;
    }

    public function delete(Blog $blog)
    {
        return $blog->delete();
    }

    public function get($id)
    {
        return Blog::find($id);
    }
}
