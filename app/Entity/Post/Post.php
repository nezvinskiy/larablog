<?php

namespace App\Entity\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function files()
    {
        return $this->hasMany(\App\Entity\Post\File::class, 'post_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Entity\Category\Category::class, 'category_id', 'id');
    }
}
