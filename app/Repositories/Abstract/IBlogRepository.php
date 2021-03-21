<?php

namespace App\Repositories\Abstract;

use Illuminate\Http\Request;

interface IBlogRepository {

    public function get_all();
    public function store(Request $request);
    public function update(Request $request);
    public function delete(Request $request);
    public function get(Request $request);
}