<?php

namespace App\Cruder\DataService\Abstract;

use App\Models\Blog;

interface IBlogDataService
{
    public function get_all();
    public function filter($search);
    public function store($data);
    public function update(Blog $blog, $data);
    public function delete(Blog $blog);
    public function get($id);
}
