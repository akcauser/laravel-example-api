<?php

namespace App\Cruder\DataService\Concrete;

use App\Cruder\DataService\Abstract\IBlogDataService;
use App\Models\Blog;

class BlogDataService implements IBlogDataService
{
    public function get_all()
    {
        return Blog::get();
    }
    /**
     * @param array $data 
     * @return mixed
     */
    public function store($data)
    {
        $blog = new Blog();
        $blog->title = $data["title"];
        $blog->body = $data["body"];

        if (!$blog->save()) {
            return false;
        }

        return $blog;
    }

    /**
     * @param Blog $blog
     * @param array $data 
     * @return mixed
     */
    public function update(Blog $blog, $data)
    {
        $blog->title = $data["title"];
        $blog->body = $data["body"];

        if (!$blog->save()) {
            return false;
        }

        return $blog;
    }

    public function delete(Blog $blog)
    {
        return $blog->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get($id)
    {
        return Blog::find($id);
    }
}
