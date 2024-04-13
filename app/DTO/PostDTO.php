<?php

namespace App\DTO;

class PostDTO
{
    public static function toArr(array $data): array
    {
        return [
            'title' => $data['title'],
            'description' => $data['description'],
            'published_at' => $data['published_at'] ?? null
        ];
    }
}
