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

    /**
     * @OA\Get(
     *      path="/blogs",
     *      operationId="getBlocksList",
     *      tags={"Blogs"},
     *      summary="Get list of blogs",
     *      description="Returns list of blogs",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\Response(response="200", description="An example resource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
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

    /**
     * @OA\Post(
     *      path="/blogs",
     *      operationId="storeBlogs",
     *      tags={"Blogs"},
     *      summary="Store new blog",
     *      description="Store a blog and returns blog data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Blog")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Blog")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
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
