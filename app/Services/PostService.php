<?php

namespace App\Services;

use App\Models\Post;
use App\DTO\PostDTO;

class PostService
{
    public function index()
    {
        return Post::all();
    }

    public function show($id)
    {
        return Post::findOrFail($id);
    }
    public function create($data)
    {
        return Post::create($data);
    }

    public function update(Post $post, $data)
    {
        $post->update($data);

        return $post;
    }

    public function delete(Post $post)
    {
        $post->delete();
    }
}
