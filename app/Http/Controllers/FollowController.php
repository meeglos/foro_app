<?php

namespace App\Http\Controllers;

use App\Post;
use App\Follow;
use App\User;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request, Post $post)
    {
//        dd(auth()->user()->name);

        auth()->user()->follow($post, $request->get('comments'));

        return redirect('posts/' .$post->id . '-' . $post->slug);
    }
}
