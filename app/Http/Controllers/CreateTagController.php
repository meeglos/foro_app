<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class CreateTagController extends Controller
{
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $tag = new Tag($request->all());

        auth()->user()->tags()->save($tag);

        return redirect('tags/index');
    }
}
