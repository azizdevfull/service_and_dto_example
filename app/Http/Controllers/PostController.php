<?php

namespace App\Http\Controllers;

use App\DTO\PostDTO;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(protected PostService $postService)
    {
    }
    public function index()
    {
        $posts = $this->postService->index();
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = $this->postService->show($id);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        $data = PostDTO::toArr($request->validated());
        $this->postService->create($data);

        return response()->api(__('post.created_success'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->postService->show($id);

        $data = PostDTO::toArr($request->validated());

        $this->postService->update($post, $data);

        return response()->api(__('post.updated_success'));
    }

    public function destroy($id)
    {
        $post = $this->postService->show($id);
        $this->postService->delete($post);

        return response()->api(__('post.deleted_success'));
    }
}
