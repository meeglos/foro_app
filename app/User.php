<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function follow(Post $post, $message)
    {
        $follow = new Follow([
            'comments' => $message,
            'post_id' => $post->id,
        ]);

        $this->follows()->save($follow);
    }
}
