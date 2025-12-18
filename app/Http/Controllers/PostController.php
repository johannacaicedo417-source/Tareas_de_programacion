<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
            'published' => 'sometimes|boolean',
        ]);

        $data['published'] = isset($data['published']) ? (bool)$data['published'] : false;

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post creado correctamente.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
            'published' => 'sometimes|boolean',
        ]);

        $data['published'] = isset($data['published']) ? (bool)$data['published'] : false;

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado.');
    }
}
