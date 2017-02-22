<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'DESC')->paginate();

        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }
}
