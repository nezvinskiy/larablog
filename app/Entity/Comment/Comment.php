<?php

namespace App\Entity\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $guarded = ['id'];

    public $timestamps = false;
}
