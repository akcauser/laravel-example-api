<?php

namespace App\Http\Controllers\API;

use App\Cruder\Service\Abstract\ITagService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class APITagController extends Controller
{
    protected ITagService $tagService;

    public function __construct(ITagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = $this->tagService->get_all();

        return response()->json($tags);
    }

    public function show($id)
    {
        $response = $this->tagService->get($id);
        if ($response === 404)
            return response()->json('Tag not found', 404);

        return response()->json($response);
    }

    public function store(TagStoreRequest $request)
    {
        $response = $this->tagService->store($request);
        if ($response === 500)
            return response()->json('Tag not created', 500);
        elseif ($response === 404)
            return response()->json('Tag not found', 404);

        return response()->json($response);
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $response = $this->tagService->update($request, $id);
        if ($response === 500)
            return response()->json('Tag not updated', 500);
        elseif ($response === 404)
            return response()->json('Tag not found', 404);

        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->tagService->delete($id);
        if ($response === 500)
            return response()->json('Tag not deleted', 500);
        elseif ($response === 404)
            return response()->json('Tag not found', 404);

        return response()->json('Tag deleted');
    }

    public function blog_tags($blogId)
    {
        $tags = $this->tagService->get_all_by_blog($blogId);

        return response()->json($tags);
    }
}
