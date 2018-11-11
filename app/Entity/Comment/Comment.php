<?php

namespace App\Entity\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(\App\Entity\Post\Comment::class, 'comment_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(\App\Entity\Category\Comment::class, 'comment_id', 'id');
    }
}
