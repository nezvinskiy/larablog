<?php

namespace App\Entity\Post;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments_posts';

    protected $fillable = ['comment_id', 'post_id'];

    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(\App\Entity\Comment\Comment::class, 'comment_id', 'id');
    }
}
