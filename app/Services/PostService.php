<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    /**
     * Get all posts
     */
    public function getAllPosts()
    {
        return Post::all();
    }

    /**
     * Store a new post
     */
    public function storePost(Request $request)
    {
        $post = new Post;
        $post->title = $request->postTitle;
        $post->description = $request->postBody;
        $post->save();

        return $post;
    }

    /**
     * Get a post by id
     */
    public function getPostById(string $id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update a post
     */
    public function updatePost(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->postTitle;
        $post->description = $request->postBody;
        $post->save();

        return $post;
    }

    /**
     * Delete a post
     */
    public function deletePost(string $id)
    {
        Post::destroy($id);
    }

    /**
     * Search posts by title or description
     */
    public function searchPosts(Request $request)
    {
        $query = $request->input('search');
        if (empty($query)) {
            return null; // If no query, return null
        }

        return Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
    }
}
