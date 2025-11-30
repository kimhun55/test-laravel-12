<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'img_path' => 'nullable|image|max:2048', // 2048 KB to 2 MB
        ]);

        if ($request->hasFile('img_path')) {
            $imagePath = $request->file('img_path')->store('images', 'public');
            $validated['img_path'] = $imagePath;
        }
       
        $post = Post::create(
            ['title' => $validated['title'],
             'content' => $validated['content'],
             'img_path' => $validated['img_path'] ?? null,
            ]
        );

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'img_path' => 'nullable|image|max:2048', // 2048 KB to 2 MB
        ]);

        if ($request->hasFile('img_path')) {
            // delete old image if exists
            if ($post->img_path) {
                Storage::disk('public')->delete($post->img_path);
            }

            $imagePath = $request->file('img_path')->store('images', 'public');
            $validated['img_path'] = $imagePath;
        }

        $post->update(
            ['title' => $validated['title'],
             'content' => $validated['content'],
             'img_path' => $validated['img_path'] ?? $post->img_path,
            ]
        );
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
