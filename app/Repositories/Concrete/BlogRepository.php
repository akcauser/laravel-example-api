<?php

namespace App\Repositories\Concrete;

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

    public function store(Request $request)
    {
        // validation will be in for loop
        $request->validate([
            'title' => ['required', 'string', 'max:255',],
            'body' => ['required', 'string'],
        ]);

        // save model
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;

        // save record, if can not save then return false
        $res = $blog->save();
        if (!$res) {
            return false;
        }

        return $blog;
    }

    public function update(Request $request)
    {
        // find or fail
        $blog = Blog::find($request->id);
        if (!$blog)
            return 'none';

        // validation will be in for loop
        $request->validate([
            'title' => ['required', 'string', 'max:255',],
            'body' => ['required', 'string'],
        ]);

        // find and update blog
        $blog = Blog::find($request->id);
        $blog->title = $request->title;
        $blog->body = $request->body;

        // save record, if can not save then return false
        $res = $blog->save();
        if (!$res) {
            return false;
        }

        return $blog;
    }

    public function delete(Request $request)
    {
        // find or fail
        $blog = Blog::find($request->id);
        if (!$blog)
            return 'none';

        // delete model
        return $blog->delete();
    }

    public function get(Request $request)
    {
        // find or fail
        $blog = Blog::find($request->id);
        if (!$blog)
            return 'none';

        // find and update blog
        return Blog::find($request->id);
    }
}
