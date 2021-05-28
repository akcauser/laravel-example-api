<?php

namespace App\Http\Controllers\CMS;

use App\Cruder\Service\Abstract\IBlogService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;

class CMSBlogController extends Controller
{
    protected IBlogService $blogService;

    public function __construct(IBlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->get_all();
        return view('cms.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogService->get($id);
        if ($blog === 404)
            abort(404);

        return view('cms.blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('cms.blogs.create');
    }

    public function store(BlogStoreRequest $request)
    {
        $response = $this->blogService->store($request);
        if ($response === 500)
            return back()->with('Success', 'Not created.');

        return back()->with('Success', 'Created');
    }

    public function edit($id)
    {
        $blog = $this->blogService->get($id);
        if ($blog === 404)
            abort(404);

        return view('cms.blogs.edit', compact('blog'));
    }

    public function update(BlogUpdateRequest $request, $id)
    {
        $response = $this->blogService->update($request, $id);
        if ($response === 500)
            return back()->with('Success', 'Not Updated.');
        elseif ($response === 404)
            abort(404);

        return back()->with('Success', 'Updated.');
    }

    public function delete($id)
    {
        $response = $this->blogService->delete($id);
        if ($response === 500)
            return back()->with('Success', 'Not deleted.');
        elseif ($response === 404)
            abort(404);
    }
}
