<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Abstract\IBlogRepository;
use Illuminate\Http\Request;

class ApiBlogController extends Controller
{
    protected IBlogRepository $blogRepository;

    public function __construct(IBlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = $this->blogRepository->get_all();

        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        // store data
        $response = $this->blogRepository->store($request);

        if (!$response)
            return response()->json('Blog not created', 500);

        // response json
        return response()->json($response);
    }

    public function update(Request $request)
    {
        // update data
        $response = $this->blogRepository->update($request);

        // cevap null ise hata
        if ($response === 'none')
            return response()->json('Blog not found', 404);

        if (!$response)
            return response()->json('Blog not updated', 500);

        // response json
        return response()->json($response);
    }

    public function destroy(Request $request)
    {
        // delete data 
        $response = $this->blogRepository->delete($request);

        if ($response === 'none')
            return response()->json('Blog not found', 404);

        if (!$response)
            return response()->json('Blog not updated', 500);

        // response json
        return response()->json('Blog deleted');
    }

    public function show(Request $request)
    {
        // delete data 
        $response = $this->blogRepository->get($request);

        if ($response === 'none')
            return response()->json('Blog not found', 404);

        // response json
        return response()->json($response);
    }
}
