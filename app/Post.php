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
        'agent_code',
        'client_code',
        'client_name',
        'client_phone',
        'client_name',
        'client_phone',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value;

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
    public function getFechaAttribute()
    {
        Carbon::setLocale('es');
        $now = Carbon::now();
        return $this->created_at->diffForHumans();
    }

    public function getCountAttribute()
    {
        $total = $this->follows()->count();

        return ($total > 0 ? $total : 'Sin llamadas.');

    }

    public function getTagListAttribute()
    {
        return $this->tags->pluck('id')->toArray();
    }

    public function addFollow($comments)
    {
        $this->follows()->create(compact('comments'));
    }

    public function getTooltipAttribute()
    {
        return '<span class="follow-author">' . $this->description . '</span> <br><u>Persona contacto</u>: ' . $this->client_name . ' <br>  <u>Teléfono contacto</u>:  ' . $this->client_phone;
    }
}
