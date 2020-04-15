<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private $title;
    private $content;
    private $linkToImage;

    protected $fillable = ['title', 'content', 'linkToImage'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}