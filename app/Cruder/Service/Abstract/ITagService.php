<?php

namespace App\Cruder\Service\Abstract;


interface ITagService
{
    public function get_all();
    public function store($request);
    public function update($request, $id);
    public function delete($id);
    public function get($id);
}
