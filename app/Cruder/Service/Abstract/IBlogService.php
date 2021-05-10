<?php

namespace App\Cruder\Service\Abstract;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;

interface IBlogService
{
    public function get_all();
    public function store(BlogStoreRequest $request);
    public function update(BlogUpdateRequest $request, $id);
    public function delete($id);
    public function get($id);
}
