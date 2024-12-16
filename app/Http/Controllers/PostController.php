<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService; // Assigning the injected service to a property

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;  // Dependency injected into the class
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view("allposts", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addpost");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->postService->storePost($request);
        return redirect()->route('posts.index')->with('status', 'New Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->postService->getPostById($id);
        return view('viewpost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = $this->postService->getPostById($id);
        return view('updatepost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->postService->updatePost($request, $id);
        return redirect()->route('posts.index')->with('status', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postService->deletePost($id);
        return redirect()->route('posts.index')->with('status', 'Post Deleted successfully');
    }

    /**
     * Search for posts.
     */
    public function search(Request $request)
    {
        $posts = $this->postService->searchPosts($request);

        if ($posts === null) {
            return redirect()->back()->with('error', 'Please fill in the search field.');
        }

        return view('allposts', compact('posts'));
    }
}
