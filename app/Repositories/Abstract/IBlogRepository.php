<?php

namespace App\Repositories\Abstract;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

interface IBlogRepository
{

    public function get_all();
    public function store(BlogStoreRequest $request);
    public function update(BlogUpdateRequest $request, Blog $blog);
    public function delete(Blog $blog);
    public function get($id);
}
