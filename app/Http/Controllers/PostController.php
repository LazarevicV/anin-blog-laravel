<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // 'images' => 'required|array',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        // Create a new blog post with title and content
        $blogPost = new Post();
        $blogPost->title = $request->input('title');
        $blogPost->content = $request->input('content');
        $blogPost->user_id = auth()->id();
        $blogPost->save();

        // Handle image uploads and associate them with the blog post
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('blog_images', 'public');

                // Create an image record and associate it with the blog post
                $blogPost->images()->create([
                    'path' => $imagePath,
                ]);
            }
        }

        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('thumbnail', 'public');

            // Update the blog post with the path to the thumbnail
            $blogPost->thumbnail = $imagePath;
            $blogPost->save();
        }

        // Redirect or respond as needed
        return redirect()->route('homepage')->with('success', ['message' => 'Blog post created successfully']);
    }

    public function show($id)
    {
        $blog = Post::with('images')->findOrFail($id);

        return view('posts.single-post', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Post::findOrFail($id);

        $blog->images()->delete();

        $blog->delete();

        return redirect()->route('homepage')->with('success', ['message' => 'Blog post deleted successfully']);
    }
}
