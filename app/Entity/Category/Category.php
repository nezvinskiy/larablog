<?php

namespace App\Entity\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function comments()
    {
        return $this->hasMany(\App\Entity\Category\Comment::class, 'category_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(\App\Entity\Post\Post::class, 'category_id', 'id');
    }
}
