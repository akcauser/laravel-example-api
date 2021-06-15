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
     * @OA\GET(
     * path="/blogs",
     * operationId="v1ListBlog",
     * tags={"Blogs"},
     * summary="List blogs",
     * description="List blogs",
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\Response(response="200", description="An example resource")
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
    public function index()
    {
        $blogs = $this->blogService->get_all();

        return response()->json($blogs);
    }

    /**
     * @OA\GET(
     * path="/blogs/{id}",
     * operationId="v1ShowBlog",
     * tags={"Blogs"},
     * summary="Show a blog",
     * description="Show a blog",
     *      @OA\Parameter(
     *          name="id",
     *          description="Blog id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\Response(response="200", description="An example resource")
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
    public function show($id)
    {
        $response = $this->blogService->get($id);
        if ($response === 404)
            return response()->json('Blog not found', 404);

        return response()->json($response);
    }

    /**
     * @OA\POST(
     * path="/blogs",
     * operationId="v1StoreBlog",
     * tags={"Blogs"},
     * summary="Store a blog",
     * description="Store a blog",
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Blog")
     * ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\Response(response="200", description="An example resource")
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
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

    /**
     * @OA\PUT(
     * path="/blogs/{id}",
     * operationId="v1UpdateBlog",
     * tags={"Blogs"},
     * summary="Update a blog",
     * description="Update a blog",
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Blog")
     * ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Blog id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\Response(response="200", description="An example resource")
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
    public function update(BlogUpdateRequest $request, $id)
    {
        $response = $this->blogService->update($request, $id);
        if ($response === 500)
            return response()->json('Blog not updated', 500);
        elseif ($response === 404)
            return response()->json('Blog not found', 404);

        return response()->json($response);
    }

    /**
     * @OA\DELETE(
     * path="/blogs/{id}",
     * operationId="v1DeleteBlog",
     * tags={"Blogs"},
     * summary="Delete a blog",
     * description="Delete a blog",
     *      @OA\Parameter(
     *          name="id",
     *          description="Blog id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\Response(response="200", description="An example resource")
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
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
