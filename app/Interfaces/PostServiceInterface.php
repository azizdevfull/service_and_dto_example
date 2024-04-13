<?php

namespace App\Interfaces;

use App\Models\Post;

interface PostServiceInterface
{
    public function index();

    public function show($id);

    public function create($data);

    public function update(Post $post, $data);

    public function delete(Post $post);
}
