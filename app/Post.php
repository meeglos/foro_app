<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'pending'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
