<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'author_id',
        'published_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'updated_at',
    ];


    public function categories()
    {
        return $this->hasMany(\App\Category::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    public function authors()
    {
        return $this->belongsToMany(\App\Author::class);
    }
}
