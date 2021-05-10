<?php

namespace App\Http\Controllers\CMS;

use App\Cruder\Service\Abstract\IBlogService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Http\Request;

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

        //todo: show blog list page
    }

    public function show($id)
    {
        $response = $this->blogService->get($id);
        if ($response === 404)
            abort(404);

        // todo: show blog detail page
    }

    public function create()
    {
        //todo: show Create Form 
    }

    public function store(BlogStoreRequest $request)
    {
        // todo: store data

        // todo: response list page or detail page
    }

    public function edit($id)
    {
        $response = $this->blogService->get($id);
        if ($response === 404)
            abort(404);

        // todo: update form open with blog data
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

        // todo: list page open
    }
}
