<?php

namespace App\Cruder\Service\Concrete;

use App\Cruder\DataService\Abstract\IBlogDataService;
use App\Cruder\Service\Abstract\IBlogService;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;

class BlogService implements IBlogService
{
    private IBlogDataService $blogDataService;

    public function __construct(IBlogDataService $blogDataService)
    {
        $this->blogDataService = $blogDataService;
    }

    public function get($id)
    {
        $blog = $this->blogDataService->get($id);
        if (!$blog) {
            return 404;
        }

        return $blog;
    }

    public function get_all()
    {
        return $this->blogDataService->get_all();
    }

    public function store(BlogStoreRequest $request)
    {
        $response = $this->blogDataService->store($request->all());
        if (!$response) {
            return 500;
        }

        return $response;
    }

    public function update(BlogUpdateRequest $request, $id)
    {
        $blog = $this->blogDataService->get($id);
        if (!$blog) {
            return 404;
        }

        $response = $this->blogDataService->update($blog, $request->all());
        if (!$response) {
            return 500;
        }

        return $response;
    }

    public function delete($id)
    {
        $blog = $this->blogDataService->get($id);
        if (!$blog) {
            return 404;
        }

        $response = $this->blogDataService->delete($blog);
        if (!$response) {
            return 500;
        }

        return $response;
    }
}
