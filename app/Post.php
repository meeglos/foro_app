<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;



class Post extends Model
{

    protected $fillable = [
        'title', 'content', 'pending'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('posts.show', [$this->id, $this->slug]);
    }

    public function getDifAttribute()
    {
        Carbon::setLocale('es');
//        CarbonInterval::setLocale('es');
//        $created = new Carbon($this->created_at);
//        $now = Carbon::now();
//        $difference = ($created->diff($now)->days < 1)
//            ? $created->diffInHours($now)
//            : $created->diffForHumans($now);
        $difference = $this->created_at->diffForHumans();
        return $difference;
    }

    public function getTotalAttribute()
    {
        return $total;
    }
}
