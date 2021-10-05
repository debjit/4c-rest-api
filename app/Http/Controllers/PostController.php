<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *      path="/post",
 *      operationId="getPostsList",
 *      tags={"Posts"},
 *      summary="Get list of posts",
 *      description="Returns list of posts",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *          @OA\Property(property="id", type="number", format="number",example="1"),
 *          @OA\Property(property="title", type="string", format="string", example = "Title"),
 *          @OA\Property(property="body", type="string",example="This is some Body."),
 *    )
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
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::query()->latest()->paginate(25));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $createPost = Post::create($request->validated());
        return new PostResource($createPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post->refresh());
    }

    /**
     * Remove the specified t1 from storage.
     * DELETE /t1s/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
