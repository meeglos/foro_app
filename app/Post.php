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

    public function getTotalAttribute()
    {
        return $total;
    }

    public function getCategoryOptions()
    {
        return ['TV', 'Móvil', 'Correo', 'Área de clientes', 'Internet'];
    }
}
