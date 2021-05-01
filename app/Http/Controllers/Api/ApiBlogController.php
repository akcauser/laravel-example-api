<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Repositories\Abstract\IBlogRepository;
use Illuminate\Http\Request;

class ApiBlogController extends Controller
{
    protected IBlogRepository $blogRepository;

    public function __construct(IBlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
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
        $blogs = $this->blogRepository->get_all();

        return response()->json($blogs);
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
        // store data
        $response = $this->blogRepository->store($request);

        if (!$response)
            return response()->json('Blog not created', 500);

        // response json
        return response()->json($response);
    }

    public function update(BlogUpdateRequest $request)
    {
        $blog = $this->blogRepository->get($request->id);
        if (!$blog)
            return response()->json('Blog not found', 404);

        $response = $this->blogRepository->update($request, $blog);
        if (!$response)
            return response()->json('Blog not updated', 500);

        return response()->json($response);
    }

    public function destroy(Request $request)
    {
        // delete data 

        $blog = $this->blogRepository->get($request->id);
        if (!$blog)
            return response()->json('Blog not found', 404);

        $response = $this->blogRepository->delete($blog);
        if (!$response)
            return response()->json('Blog not deleted', 500);

        // response json
        return response()->json('Blog deleted');
    }

    public function get(Request $request)
    {
        $blog = $this->blogRepository->get($request->id);
        if (!$blog)
            return response()->json('Blog not found', 404);

        return response()->json($blog);
    }
}
