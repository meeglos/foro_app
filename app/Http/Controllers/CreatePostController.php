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

        $pos->tags()->attach($request->input('category'));

        return redirect('posts/index');
    }

    public function edit(Post $post)
    {
        $tags = Tag::pluck('description', 'id')->toArray();

        return view('posts.edit', compact('post', 'tags'));
    }
}
