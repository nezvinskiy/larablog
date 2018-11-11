<?php

namespace App\Entity\Category;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments_categories';

    protected $fillable = ['comment_id', 'category_id'];

    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(\App\Entity\Comment\Comment::class, 'comment_id', 'id');
    }
}
