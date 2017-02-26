<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create()
    {
        $tags = Tag::pluck('description', 'id')->toArray();

        return view('posts.create', compact('tags'));
    }

    public function store(Request $request)
    {

        $pos = auth()->user()->posts()->save(new Post($request->all()));

        $pos->tags()->sync($request->input('category'));

        return redirect('posts/index');
    }

    public function edit($id)
    {
        $tags = Tag::pluck('description', 'id')->toArray();

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post', 'tags'));
    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);

        $post->update($request->all());

//        dd($request->input('category'));

        $post->tags()->sync($request->input('category'));

        return redirect('posts/index');
    }
}
