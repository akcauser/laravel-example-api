<?php

namespace App\Http\Controllers\API;

use App\Cruder\Service\Abstract\IBlogService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;

class APIBlogController extends Controller
{
    protected IBlogService $blogService;

    public function __construct(IBlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->get_all();

        return response()->json($blogs);
    }


    public function show($id)
    {
        $response = $this->blogService->get($id);
        if ($response === 404)
            return response()->json('Blog not found', 404);

        return response()->json($response);
    }

    public function store(BlogStoreRequest $request)
    {
        $response = $this->blogService->store($request);
        if ($response === 500)
            return response()->json('Blog not created', 500);
        elseif ($response === 404)
            return response()->json('Blog not found', 404);

        return response()->json($response);
    }

    public function update(BlogUpdateRequest $request, $id)
    {
        $response = $this->blogService->update($request, $id);
        if ($response === 500)
            return response()->json('Blog not updated', 500);
        elseif ($response === 404)
            return response()->json('Blog not found', 404);

        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->blogService->delete($id);
        if ($response === 500)
            return response()->json('Blog not deleted', 500);
        elseif ($response === 404)
            return response()->json('Blog not found', 404);

        return response()->json('Blog deleted');
    }
}
