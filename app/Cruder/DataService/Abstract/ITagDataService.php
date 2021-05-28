<?php

namespace App\Cruder\DataService\Abstract;

use App\Models\Tag;

interface ITagDataService
{
    public function get_all();
    public function filter($search);
    public function store($data);
    public function update(Tag $tag, $data);
    public function delete(Tag $tag);
    public function get($id);
}
