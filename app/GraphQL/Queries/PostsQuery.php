<?php

namespace App\GraphQL\Queries;

use App\Models\Post;

class PostsQuery
{
    public function __invoke($rootValue, array $args)
    {
        $page = $args['page'] ?? 1;
        $limit = $args['limit'] ?? 10;
        
        $posts = Post::with(['author', 'comments'])
            ->paginate($limit, ['*'], 'page', $page);
        
        return [
            'posts' => $posts->items(),
            'total' => $posts->total(),
            'page' => $posts->currentPage(),
            'limit' => $posts->perPage(),
            'totalPages' => $posts->lastPage(),
        ];
    }
}