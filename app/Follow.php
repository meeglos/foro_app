<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'comments', 'user_id', 'post_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function getDifAttribute()
    {
        Carbon::setLocale('es');

        $difference = $this->created_at->diffForHumans();
        return $difference;
    }
}
