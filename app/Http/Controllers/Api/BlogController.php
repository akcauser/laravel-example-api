<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Abstract\IBlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected IBlogRepository $blogRepository;

    public function __construct(IBlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function list()
    {
        $blogs = $this->blogRepository->get_all();

        return $this->response(data: $blogs);
    }

    public function create(Request $request)
    {
        // store data
        $response = $this->blogRepository->store($request);

        if (!$response)
            return $this->response(error: true, code: 500, message: 'Blog not created.', data: []);

        // response json
        return $this->response(message: 'Blog created.', data: $response);
    }

    public function update(Request $request)
    {
        // update data
        $response = $this->blogRepository->update($request);

        // cevap null ise hata
        if ($response === 'none')
            return $this->response(error: true, code: 404, message: 'Blog not found.', data: []);

        if (!$response)
            return $this->response(error: true, code: 500, message: 'Blog not updated.', data: []);

        // response json
        return $this->response(message: 'Blog updated.', data: $response);
    }

    public function delete(Request $request)
    {
        // delete data 
        $response = $this->blogRepository->delete($request);

        if ($response === 'none')
            return $this->response(error: true, code: 404, message: 'Blog not found.', data: []);

        if (!$response)
            return $this->response(error: true, code: 500, message: 'Blog not deleted.', data: []);

        // response json
        return $this->response(message: 'Blog deleted.', data: $response);
    }

    public function detail(Request $request)
    {
        // delete data 
        $response = $this->blogRepository->get($request);

        if ($response === 'none')
            return $this->response(error: true, code: 404, message: 'Blog not found.', data: []);

        // response json
        return $this->response(message: 'Success.', data: $response);
    }
}
