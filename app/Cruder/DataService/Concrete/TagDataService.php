<?php

namespace App\Cruder\DataService\Concrete;

use App\Cruder\DataService\Abstract\ITagDataService;
use App\Models\Tag;

class TagDataService implements ITagDataService
{
    public function get_all()
    {
        return Tag::paginate(15);
    }

    public function filter($search)
    {
        $query = Tag::query();

        if (isset($search)) {
            $words = explode(' ', $search);
            if (count($words) > 0) {
                $query = $query->where(function ($sQuery) use ($words) {
                    foreach ($words as $word) {
                        $sQuery->orWhere('title', 'like', "%$word%");
                    }
                });
            }
        }

        return $query->paginate(15);
    }

    /**
     * @param array $data 
     * @return mixed
     */
    public function store($data)
    {
        $tag = new Tag();
        $tag->title = $data["title"];
        $tag->blog_id = $data["blog_id"];

        if (!$tag->save()) {
            return false;
        }

        return $tag;
    }

    /**
     * @param Tag $tag
     * @param array $data 
     * @return mixed
     */
    public function update(Tag $tag, $data)
    {
        $tag->title = $data["title"];
        $tag->blog_id = $data["blog_id"];

        if (!$tag->save()) {
            return false;
        }

        return $tag;
    }

    public function delete(Tag $tag)
    {
        return $tag->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get($id)
    {
        return Tag::find($id);
    }

    public function get_all_by_blog($blogId)
    {
        return Tag::where('blog_id', $blogId)->get();
    }
}
