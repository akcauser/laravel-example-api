<?php

namespace App\Http\Controllers\CMS;

use App\Cruder\Service\Abstract\IBlogService;
use App\Cruder\Service\Abstract\ITagService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class CMSTagController extends Controller
{
    protected ITagService $tagService;
    protected IBlogService $blogService;

    public function __construct(ITagService $tagService, IBlogService $blogService)
    {
        $this->tagService = $tagService;
        $this->blogService = $blogService;
    }

    public function index()
    {
        $tags = $this->tagService->get_all();
        return view('cms.tags.index', compact('tags'));
    }

    public function show($id)
    {
        $tag = $this->tagService->get($id);
        if ($tag === 404)
            abort(404);

        return view('cms.tags.show', compact('tag'));
    }

    public function create()
    {
        return view('cms.tags.create');
    }

    public function store(TagStoreRequest $request)
    {
        $response = $this->tagService->store($request);
        if ($response === 500)
            return back()->with('Success', 'Not created.');

        return back()->with('Success', 'Created');
    }

    public function edit($id)
    {
        $tag = $this->tagService->get($id);
        if ($tag === 404)
            abort(404);

        return view('cms.tags.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $response = $this->tagService->update($request, $id);
        if ($response === 500)
            return back()->with('Success', 'Not Updated.');
        elseif ($response === 404)
            abort(404);

        return back()->with('Success', 'Updated.');
    }

    public function delete($id)
    {
        $response = $this->tagService->delete($id);
        if ($response === 500)
            return back()->with('Success', 'Not deleted.');
        elseif ($response === 404)
            abort(404);

        // todo: list page open
    }
}
